<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $monthlySales = DB::table('chi_tiet_don_hang')
            ->join('don_hangs', 'chi_tiet_don_hang.don_hang_id', '=', 'don_hangs.id')
            ->select(DB::raw('MONTH(don_hangs.created_at) as month'), DB::raw('SUM(chi_tiet_don_hang.so_luong) as total_quantity'))
            ->groupBy(DB::raw('MONTH(don_hangs.created_at)'))
            ->orderBy(DB::raw('MONTH(don_hangs.created_at)'))
            ->get();

        $monthlySalesChartData = $monthlySales->mapWithKeys(function ($item) {
            return [$item->month => $item->total_quantity];
        })->toArray();

        $categorySales = DB::table('san_phams')
            ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
            ->select('danh_mucs.ten_danh_muc', DB::raw('SUM(san_phams.soluong_sp) as total_quantity'))
            ->groupBy('danh_mucs.ten_danh_muc')
            ->get();

        $categorySalesChartData = $categorySales->mapWithKeys(function ($item) {
            return [$item->ten_danh_muc => $item->total_quantity];
        })->toArray();

        return view('admin.Statistics', [
            'monthlySalesChartData' => $monthlySalesChartData,
            'categorySalesChartData' => $categorySalesChartData
        ]);
    }
}
