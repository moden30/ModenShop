@extends('admin.layout.master')

@section('conten')
    <style>
        /* Đảm bảo không gian cho thanh navbar bên trái */
        .sidebar {
            width: 250px; /* Chiều rộng của thanh navbar */
            position: fixed;
            top: 0; /* Bắt đầu từ đầu trang */
            left: 0;
            height: 100vh; /* Chiều cao của thanh navbar */
            background-color: #f8f9fa;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            z-index: 999; /* Đảm bảo thanh navbar nằm dưới thanh header */
            box-sizing: border-box; /* Đảm bảo padding không làm tăng chiều cao */
        }

        .chart-container {
            display: flex;
            justify-content: space-around; /* Sử dụng space-around để các biểu đồ gần nhau hơn */
            align-items: flex-start;
            flex-wrap: wrap;
            height: calc(100vh - 60px); /* Chiều cao vùng chứa biểu đồ, tính chiều cao thanh header */
            margin-left: 250px; /* Đẩy vùng chứa biểu đồ ra khỏi thanh navbar */
            margin-top: 60px; /* Đẩy vùng chứa biểu đồ ra khỏi thanh header */
            padding: 20px;
            background-color: #f5f5f5;
            box-sizing: border-box;
        }

        .chart-wrapper {
            width: 45%; /* Điều chỉnh kích thước của từng biểu đồ */
            max-width: 500px;
            margin: 0; /* Giảm khoảng cách giữa các phần tử */
        }

        canvas {
            width: 100% !important; /* Đảm bảo biểu đồ chiếm toàn bộ chiều rộng của phần tử cha */
            height: 300px !important; /* Thay đổi chiều cao của biểu đồ */
        }

        h1 {
            text-align: center;
            font-size: 18px; /* Thay đổi kích thước chữ tiêu đề */
            margin-bottom: 10px; /* Giảm khoảng cách dưới tiêu đề */
        }
    </style>

    <div class="sidebar">
        <!-- Nội dung thanh navbar -->
        <p>Sidebar</p>
    </div>

    <div class="chart-container">
        <div class="chart-wrapper">
            <h1>Biểu đồ thống kê sản phẩm đã bán theo tháng</h1>
            <canvas id="salesChart"></canvas>
        </div>

        <div class="chart-wrapper">
            <h1>Biểu đồ số lượng sản phẩm theo danh mục</h1>
            <canvas id="categoryChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctxSales = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctxSales, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($monthlySalesChartData)) !!},
                datasets: [{
                    label: 'Số lượng sản phẩm đã bán',
                    data: {!! json_encode(array_values($monthlySalesChartData)) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxCategory = document.getElementById('categoryChart').getContext('2d');
        var categoryChart = new Chart(ctxCategory, {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_keys($categorySalesChartData)) !!},
                datasets: [{
                    label: 'Số lượng sản phẩm theo danh mục',
                    data: {!! json_encode(array_values($categorySalesChartData)) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.raw !== null) {
                                    label += context.raw;
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
