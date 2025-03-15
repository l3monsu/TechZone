<?php
require_once '../../Project1_Group-TechZone/model/m_base.php';
require_once '../../Project1_Group-TechZone/model/m_home.php';

// Khởi tạo model
$model = new ReportModel();

// Lấy dữ liệu từ model
$totalRevenue = $model->getTotalRevenue();
$monthlyRevenue = $model->getMonthlyRevenue();
$inventoryData = $model->getInventoryData();
$outOfStockData = $model->getOutOfStockData();
$categoryRevenue = $model->getRevenueByCategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo - TechZone</title>
    <style>
        header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .container {
            display: flex;
            flex-direction: column; /* Đổi thành cột để các phần xuống dưới */
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .top-row {
            display: flex;
            flex-direction: row; /* Các phần nằm ngang */
            justify-content: space-between; /* Chia đều không gian */
            gap: 10px;
        }
        .bottom-row {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap; /* Cho phép các phần xuống dòng khi cần */
            gap: 10px;
            margin-top: 10px;
            margin-left: 100px;
        }
        .report-box {
            min-width: 200px; /* Chiều rộng tối thiểu */
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }
        .report-box h3 {
            font-size: 16px;
            margin-bottom: 8px;
            color: #333;
        }
        .report-box p {
            font-size: 14px;
            margin: 0;
            color: #555;
        }
        .report-box.chart {
            min-width: 320px;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .chart-container {
            position: relative;
            width: 100%;
            height: 300px;
        }
        ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <header>Báo cáo thống kê</header>
    <div class="container">
        <div class="top-row">
            <div class="report-box">
                <h3>Tổng doanh thu bán</h3>
                <p><?= number_format($totalRevenue, 0, ',', '.') ?> VNĐ</p>
            </div>
            <div class="report-box">
                <h3>Doanh thu tháng hiện tại</h3>
                <p><?= number_format($monthlyRevenue, 0, ',', '.') ?> VNĐ</p>
            </div>
        </div>
        <div class="bottom-row">
            <div class="report-box chart">
                <h3>Biểu đồ doanh thu</h3>
                <div class="chart-container">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
            <div class="report-box">
                <h3>Sản phẩm tồn kho</h3>
                <ul>
                    <?php foreach ($inventoryData as $item): ?>
                        <li><?= $item['ten_sanPham'] ?>: <?= $item['soLuong'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="report-box">
                <h3>Sản phẩm hết hàng</h3>
                <ul>
                    <?php foreach ($outOfStockData as $item): ?>
                        <li><?= $item['ten_sanPham'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // Giả sử $categoryRevenue chứa dữ liệu trả về từ phương thức getRevenueByCategory()
    const categoryRevenue = <?= json_encode($categoryRevenue) ?>;

    // Khởi tạo mảng để chứa dữ liệu biểu đồ
    let categoryData = [];
    let categoryLabels = [];

    // Lặp qua dữ liệu và phân loại theo tháng
    for (let i = 1; i <= 12; i++) {
        let monthRevenue = Array(12).fill(0);  // Mảng doanh thu cho từng tháng, khởi tạo mặc định là 0
        categoryRevenue.forEach(item => {
            if (item.month === i) {
                // Thêm doanh thu vào đúng tháng
                monthRevenue[i - 1] += parseFloat(item.revenue);
            }
        });
        categoryData.push(monthRevenue[i - 1]); // Đưa doanh thu tháng vào dữ liệu biểu đồ
    }

    // Dữ liệu biểu đồ
    const ctx = document.getElementById('categoryChart').getContext('2d');
new Chart(ctx, {
    type: 'pie', // Đổi từ 'bar' sang 'pie' để vẽ biểu đồ tròn
    data: {
        labels: ['Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: 'Doanh thu từng tháng',
            data: categoryData,
            backgroundColor: [
                    '#007bff', '#28a745', '#dc3545'
            ], // Bạn có thể thêm màu sắc tùy ý cho mỗi phần
            borderColor: '#ffffff', // Màu viền của các phần trong biểu đồ
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top', // Đặt legend ở vị trí trên cùng
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw + ' VNĐ'; // Hiển thị doanh thu khi hover
                    }
                }
            }
        }
    }
});

</script>
</body>
</html>