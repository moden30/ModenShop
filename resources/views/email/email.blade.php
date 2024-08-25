{{--<!DOCTYPE html>--}}
{{--<html>--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Order Invoice</title>--}}
{{--    <style>--}}
{{--        body {--}}
{{--            font-family: Arial, sans-serif;--}}
{{--            margin: 0;--}}
{{--            padding: 0;--}}
{{--            background-color: #f4f4f4;--}}
{{--        }--}}

{{--        .container {--}}
{{--            max-width: 600px;--}}
{{--            margin: auto;--}}
{{--            background: #fff;--}}
{{--            padding: 20px;--}}
{{--            border-radius: 5px;--}}
{{--            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);--}}
{{--        }--}}

{{--        h1,--}}
{{--        h2 {--}}
{{--            color: #333;--}}
{{--        }--}}

{{--        p {--}}
{{--            color: #555;--}}
{{--        }--}}

{{--        table {--}}
{{--            width: 100%;--}}
{{--            border-collapse: collapse;--}}
{{--            margin: 20px 0;--}}
{{--        }--}}

{{--        table,--}}
{{--        th,--}}
{{--        td {--}}
{{--            border: 1px solid #ddd;--}}
{{--        }--}}

{{--        th,--}}
{{--        td {--}}
{{--            padding: 10px;--}}
{{--            text-align: left;--}}
{{--        }--}}

{{--        th {--}}
{{--            background-color: #f4f4f4;--}}
{{--        }--}}

{{--        .total {--}}
{{--            text-align: right;--}}
{{--            font-weight: bold;--}}
{{--        }--}}

{{--        .footer {--}}
{{--            margin-top: 20px;--}}
{{--            text-align: center;--}}
{{--            font-size: 0.9em;--}}
{{--            color: #777;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="container">--}}
{{--    <h1>Order Invoice</h1>--}}
{{--    <p>Dear {{ $donhang->ma_don_hang  }},</p>--}}
{{--    <p>Thank you for your order! Below are the details of your order:</p>--}}

{{--    <p><strong>Order Code:</strong> {{ $donhang->ma_don_hang }}</p>--}}
{{--    <p><strong>Order Date:</strong> {{ $donhang->created_at->format('d M, Y') }}</p>--}}

{{--    <h2>Order Details</h2>--}}
{{--    <table>--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Product</th>--}}
{{--            <th>Quantity</th>--}}
{{--            <th>Price</th>--}}
{{--            <th>Total</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach ($chitietdonhang as $item)--}}
{{--            @foreach ($item->sanpham as $product)--}}
{{--                <tr>--}}
{{--                    <td>{{ $product->ten_san_pham }}</td>--}}
{{--                    <td>{{ $item->so_luong }}</td>--}}
{{--                    <td>{{ number_format($product->gia_sp, 2) }}</td>--}}
{{--                    <td>{{ number_format($item->so_luong * $product->gia_sp, 0) }} Vnđ</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--        <tfoot>--}}
{{--        <tr>--}}
{{--            <td colspan="3" class="total">Total Amount:</td>--}}
{{--            <td>${{ number_format($donhang->gia_sp, 0, ',', '.') }} Vnđ</td>--}}
{{--        </tr>--}}
{{--        </tfoot>--}}
{{--    </table>--}}

{{--    <p>If you have any questions about your order, please contact us at [Your Contact Information].</p>--}}

{{--    <div class="footer">--}}
{{--        <p>Thank you for shopping with us!</p>--}}
{{--        <p>[Your Company Name]</p>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}

{{--</html>--}}


    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        p {
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Order Invoice</h1>
    <p>Dear {{ $donhang->ma_don_hang  }},</p>
    <p>Thank you for your order! Below are the details of your order:</p>

    <p><strong>Order Code:</strong> {{ $donhang->ma_don_hang }}</p>
    <p><strong>Order Date:</strong> {{ $donhang->created_at->format('d M, Y') }}</p>

    <h2>Order Details</h2>
    <table>
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($chitietdonhang as $item)
            <tr>
                <td>{{ $item->sanpham->ten_san_pham ?? 'N/A' }}</td>
                <td>{{ $item->so_luong }}</td>
                <td>{{ number_format($item->don_gia, 2) }}</td>
                <td>{{ number_format($item->so_luong * $item->don_gia, 0) }} Vnđ</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3" class="total">Total Amount:</td>
            <td>{{ number_format($donhang->tong_tien, 0, ',', '.') }} Vnđ</td>
        </tr>
        </tfoot>
    </table>

    <p>If you have any questions about your order, please contact us at [Your Contact Information].</p>

    <div class="footer">
        <p>Thank you for shopping with us!</p>
        <p>[Your Company Name]</p>
    </div>
</div>
</body>
</html>


