<?php
if(isset($_GET['act'])) {
switch ($_GET['act']) {
    case 'home':
        include_once "view/layout/header.php";
        include_once "view/page_home.php";
        include_once "view/layout/footer.php";
        break;
    case 'order':
        include_once "../../Project1_Group-TechZone/model/page.php";
        include_once "../../Project1_Group-TechZone/model/pdo.php";
        $orderList= order_getAll();
        $statusnames = [
            'gio-hang' => 'Chờ xác nhận',
            'cho-van-chuyen' => 'Chờ vận chuyển',
            'dang-van-chuyen' => 'Đang vận chuyển',
            'da-van-chuyen' => 'Đã vận chuyển'
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateStatus'])) {
            if (isset($_POST['ma_donHang']) && isset($_POST['currentStatus'])) {
                $ma_donHang = $_POST['ma_donHang'];
                $currentStatus = $_POST['currentStatus'];
        
                // Cập nhật trạng thái
                if (updateStatus($ma_donHang, $currentStatus)) {
                    // Reload lại trang sau khi cập nhật
                    header("Location: ?mod=page&act=order");
                    exit();
                } else {
                    echo "Cập nhật trạng thái thất bại.";
                }
            } else {
                echo "Dữ liệu không hợp lệ.";
            }
        }
        


        include_once "view/layout/header.php";
        include_once "view/page_order.php";
        include_once "view/layout/footer.php";
        break;
        case 'orderdetail':
            include_once "../../Project1_Group-TechZone/model/page.php";
            include_once "../../Project1_Group-TechZone/model/pdo.php";
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $ma_donHang = $_GET['id'];
            
                    // Lấy thông tin đơn hàng
                    $order = order_getById($ma_donHang);
            
                    // Lấy chi tiết đơn hàng
                    $orderDetail = order_getdetailById($ma_donHang);
            
                    // Kiểm tra nếu đơn hàng không tồn tại
                    if (!$order) {
                        echo "Đơn hàng không tồn tại!";
                        break;
                    }
            
                    // Hiển thị view chi tiết đơn hàng
                    include_once "view/layout/header.php";
                    include_once "view/page_detail_order.php";
                    include_once "view/layout/footer.php";
                } else {
                    echo "Mã đơn hàng không hợp lệ!";
                }
                break;
    
    default:
        # code...
        break;
}
}else{
    header("Location: ?mod=page&act=home");
}