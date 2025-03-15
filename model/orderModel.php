<?php
require_once '../Project1_Group-TechZone/model/pdo_client.php'; 

class OrderModel
{
    private $db; 

    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function createOrder($tongTien, $ngay, $diaChi, $ten_nguoiDung, $soDienThoai, $ma_nguoiDung, $ma_sanPham, $ma_giamGia, $trangThai)
    {
        $sql = "INSERT INTO donhang (tongTien, ngay, diaChi, ten_nguoiDung, soDienThoai, ma_nguoiDung, ma_sanPham, ma_giamGia, trangThai)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        return $this->db->query($sql, [
            $tongTien,
            $ngay,
            $diaChi,
            $ten_nguoiDung,
            $soDienThoai,
            $ma_nguoiDung,
            $ma_sanPham,
            $ma_giamGia,
            $trangThai
        ]);
    }
}

?>
