<?php
class DonHangController
{
    private $donHangModel;

    public function __construct()
    {
        require_once '../Project1_Group-TechZone/model/DonHangModel.php';
        $this->donHangModel = new DonHangModel();
    }

    // Hiển thị danh sách đơn hàng của người dùng
    public function hienThiDonHang($ma_nguoiDung = null)
    {
        // Kiểm tra nếu không có $ma_nguoiDung từ tham số, lấy từ session (hoặc cách khác)
        if (!$ma_nguoiDung) {
            
            if (isset($_SESSION['ma_nguoiDung'])) {
                $ma_nguoiDung = $_SESSION['ma_nguoiDung'];
            } else {
                header("Location: index.php?page=login.php");
                exit();
            }
        }

        // Gọi model để lấy dữ liệu đơn hàng
        $donHangModel = new DonHangModel();
        $donHangs = $donHangModel->layDonHangTheoNguoiDung($ma_nguoiDung);

        require_once '../Project1_Group-TechZone/view/donhang.php'; 
    }
    // Hủy đơn hàng
    public function huyDonHang($ma_donHang)
    {
        $donHangModel = new DonHangModel();
        $result = $donHangModel->cancelOrder($ma_donHang);
    
        if ($result) {
            // Thông báo thành công
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Hủy đơn hàng thành công!",
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    location.href = "index.php?page=donhang";
                });
            </script>';
        } else {
            // Thông báo thất bại
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Hủy đơn hàng thất bại!",
                    text: "Đơn hàng đã được xác nhận hoặc không tồn tại.",
                    showConfirmButton: true
                });
            </script>';
        }
    }
    
}
