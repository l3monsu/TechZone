<?php
class OrderController
{
    public function placeOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nhận các giá trị từ form
            // $ma_donHang = $_POST['ma_donHang'];
            $ngay = $_POST['ngay'];
            $diaChi = $_POST['diaChi'];
            $ten_nguoiDung = $_POST['ten_nguoiDung'];
            $soDienThoai = $_POST['soDienThoai'];
            $ma_nguoiDung = $_POST['ma_nguoiDung'];
            $ma_sanPham = $_POST['ma_sanPham'];
            $ma_giamGia = $_POST['ma_giamGia'] ?? null; // Kiểm tra nếu có mã giảm giá
            $trangThai = $_POST['trangThai'];

            // Tính tổng tiền từ giỏ hàng (nếu có)
            $totalPrice = 0;
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    // Giả sử mỗi item có 'price' và 'quantity'
                    $totalPrice += $item['price'] * $item['quantity'];
                }
            }

            // Kiểm tra xem tổng tiền có hợp lệ không
            if ($totalPrice <= 0) {
                echo '<script>alert("Tổng tiền không hợp lệ.");</script>';
                exit();
            }

            // Gọi model để lưu đơn hàng vào database
            require_once './model/orderModel.php';
            $orderModel = new OrderModel();

            $result = $orderModel->createOrder(
                // $ma_donHang,
                $totalPrice, // Sử dụng tổng tiền tính được từ giỏ hàng
                $ngay,
                $diaChi,
                $ten_nguoiDung,
                $soDienThoai,
                $ma_nguoiDung,
                $ma_sanPham,
                $ma_giamGia,
                $trangThai
            );

            // Xử lý kết quả
            if ($result) {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "ĐẶT HÀNG THÀNH CÔNG!",
                        text: "Mã đơn hàng của bạn là: ' . $ma_donHang . '",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        location.href = "index.php?page=index";
                    });
                </script>';
                exit();
            } else {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "ĐẶT HÀNG THẤT BẠI",
                        text: "Có lỗi xảy ra trong quá trình đặt hàng.",
                        showConfirmButton: true
                    });
                </script>';
            }
        }
    }
   
}
?>