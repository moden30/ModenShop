<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Mail\OrdeConfirm;
use App\Mail\OrderInvoice;
use App\Models\ChiTietDonHang;
use App\Models\Donhang;
use Illuminate\Support\Facades\Mail;
use function Laravel\Prompts\search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donhangs = Donhang::query()
            ->where('khach_hang_id', Auth::id())
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo, nếu cần
            ->paginate(5); // Hiển thị 5 đơn hàng mỗi trang

        return view('client.donhang.danhsach', compact('donhangs'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cart = session()->get('cart', []);
        if(!empty($cart)){
            $total = 0;
            $subtotal = 0;
            foreach ($cart as  $item) {
                $subtotal += $item['gia_sp'] * $item['soluong_sp'];
            }
            $shipping = 100000;
            $total = $subtotal + $shipping;

            return view('client.donhang.index', compact('cart','subtotal', 'total', 'shipping'));
        }
        return redirect()->route('giohangs');

    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Định nghĩa quy tắc xác thực
            $rules = [
                'ten_nguoi_nhan' => 'required|string|max:255',
                'so_dien_thoai' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'email' => 'required|string|max:255',
                'dia_chi_nguoi_nhan' => 'required|string|max:255',
            ];
             $request->validate($rules);

            DB::beginTransaction();
            try {
                $params = $request->all();

                $params['ma_don_hang'] = $this->generateUniqueOrderCode();
                $params['khach_hang_id'] = Auth::id();
                $donhang = Donhang::query()->create($params);
                $don_hang_id = $donhang->id;
                $chitietdonhang = ChiTietDonHang::with('sanpham')->where('don_hang_id', $don_hang_id)->get();
//                dd($chitietdonhang);
                // Lấy dữ liệu giỏ hàng
                $cart = session()->get('cart', []);
                if (empty($cart)) {
                    throw new \Exception('Giỏ hàng trống');
                }

                foreach ($cart as $key => $item) {
                    $thanhtien = $item['gia_sp'] * $item['soluong_sp'];
                    ChiTietDonHang::query()->create([
                        'don_hang_id' => $don_hang_id,
                        'san_pham_id' => $key,
                        'don_gia' => $item['gia_sp'],
                        'so_luong' => $item['soluong_sp'],
                        'thanh_tien' => $thanhtien
                    ]);
                }
                DB::commit();  // Xác nhận giao dịch

                if (!isset($request->email)) {

                    return redirect()->route('giohangs')->with('error', 'Địa chỉ email không hợp lệ.');
                }
////                //gửi mail
                Mail::to($request->email)->send((new OrderInvoice($donhang, $chitietdonhang)));

                session()->forget('cart');
                return redirect()->route('index')->with('success', 'Tạo đơn hàng thành công');

            } catch (\Exception $e) {
                DB::rollBack();  // Hoàn tác giao dịch nếu có lỗi xảy ra
                // Ghi log lỗi hoặc kiểm tra thông điệp lỗi
//                Log::error('Lỗi khi tạo đơn hàng: ' . $e->getMessage());
//               return redirect()->route('giohangs')->with('error', 'Có lỗi khi tạo đơn hàng. Vui lòng thử lại sau.');
                throw new \Exception($e);
            }
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('chi_tiet_don_hang')
            ->join('san_phams', 'chi_tiet_don_hang.san_pham_id', '=', 'san_phams.id')
            ->where('don_hang_id', $id)
            ->get();
        $totalPrice = DB::table('chi_tiet_don_hang')
            ->join('san_phams', 'chi_tiet_don_hang.san_pham_id', '=', 'san_phams.id')
            ->where('don_hang_id', $id)
            ->sum(DB::raw('san_phams.gia_sp'));

        return view('client.donhang.chitiet',[
            'donhangs' => $data,
            'totalPrice' => $totalPrice,

            'donhang' => Donhang::query()->find($id),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $donhang = Donhang::findOrFail($id);

        // Lưu trạng thái hiện tại của đơn hàng
        $currentStatus = $donhang->trang_thai_don_hang;
        $newStatus = $request->input('trang_thai', null);

        // Kiểm tra và xử lý các trường hợp theo trạng thái của đơn hàng
        if ($request->has('huy_don_hang')) {
            // Xử lý hủy đơn hàng
            if ($currentStatus === 'dang_chuan_bi' || $currentStatus === 'cho_xac_nhan') {
                $donhang->trang_thai_don_hang = 'huy_don_hang';
            } else {
                return redirect()->back()->with('error', 'Không thể hủy đơn hàng ở trạng thái hiện tại.');
            }
        } elseif ($request->has('dang_giao_hang')) {
            // Xử lý đã nhận hàng
            if ($currentStatus === 'dang_giao_hang' || $currentStatus === 'da_giao_hang') {
                $donhang->trang_thai_don_hang = 'da_giao_hang';
            } else {
                return redirect()->back()->with('error', 'Trạng thái không hợp lệ để chuyển thành đã giao hàng.');
            }
        } elseif ($newStatus) {
            // Xử lý các trạng thái khác
            if ($currentStatus === 'dang_chuan_bi' && $newStatus === 'cho_xac_nhan') {
                return redirect()->back()->with('error', 'Không thể chuyển từ trạng thái "Đang chuẩn bị" sang "Chờ xác nhận".');
            } elseif ($currentStatus === 'dang_van_chuyen' && $newStatus === 'dang_chuan_bi') {
                return redirect()->back()->with('error', 'Không thể chuyển từ trạng thái "Đang vận chuyển" về "Đang chuẩn bị".');
            } elseif ($currentStatus === 'da_giao_hang' && $newStatus === 'cho_xac_nhan') {
                return redirect()->back()->with('error', 'Không thể chuyển từ trạng thái "Đã giao hàng" về "Chờ xác nhận".');
            } else {
                $donhang->trang_thai_don_hang = $newStatus;
            }
        }
        $donhang->save();
        return redirect()->route('index')->with('success', 'Cập nhật đơn hàng thành công!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateUniqueOrderCode()
    {
        do {
            // Tạo mã đơn hàng duy nhất
            $orderCode = 'ORD-' . Auth::id() . '-' . now()->timestamp;
        } while (Donhang::where('ma_don_hang', $orderCode)->exists());

        return $orderCode;
//        return 1;
    }

}
