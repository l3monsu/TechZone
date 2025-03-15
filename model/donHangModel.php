<?php
require_once '../Project1_Group-TechZone/model/pdo_client.php'; 

class DonHangModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function layDonHangTheoNguoiDung($ma_nguoiDung)
    {
        // Kiểm tra nếu ma_nguoiDung không hợp lệ (null hoặc không có giá trị)
        if (!$ma_nguoiDung) {
            return [];  // Trả về một mảng rỗng nếu không có ma_nguoiDung hợp lệ
        }

        $sql = "SELECT * FROM donhang WHERE ma_nguoiDung = :ma_nguoiDung ORDER BY ngay DESC";
        $params = ['ma_nguoiDung' => $ma_nguoiDung];

        return $this->db->getAll($sql, $params);
    }

    // Cập nhật trạng thái đơn hàng
    public function updateOrder($ma_donHang, $trangThai)
    {
        $sql = "UPDATE donhang SET trangThai = :trangThai WHERE ma_donHang = :ma_donHang";
        $params = [
            'trangThai' => $trangThai,
            'ma_donHang' => $ma_donHang
        ];
        return $this->db->update($sql, $params); 
    }

    // Hủy đơn hàng
    public function cancelOrder($ma_donHang)
    {
        // Kiểm tra trạng thái hiện tại trước khi cập nhật
        $sql = "UPDATE donhang 
                SET trangThai = 3 
                WHERE ma_donHang = :ma_donHang AND trangThai = 0"; // Chỉ cập nhật nếu trạng thái hiện tại là 0
        $params = ['ma_donHang' => $ma_donHang];
    
        return $this->db->update($sql, $params);  // Cập nhật trạng thái thành "Đã hủy"
    }
}
?>
