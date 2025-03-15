<?php
require_once '../model/m_base.php';
$model = new BaseModel();
class m_Blog{
    public $db;
    public function __construct() {
        $baseModel = new BaseModel();
        $this->db = $baseModel->db; 
    }
    public function getAllBlog() {
        $stmt = $this->db->prepare("SELECT * FROM baiviet");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addBlog($tieuDe, $ma_baiViet, $moTa, $trangThai, $hinhAnh = null, $mota_chitiet = '') {
        if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] === UPLOAD_ERR_OK) {
            $targetDir = 'uploads/';
            $targetFile = $targetDir . basename($_FILES['hinhAnh']['name']);
            move_uploaded_file($_FILES['hinhAnh']['tmp_name'], $targetFile);  // Di chuyển tệp vào thư mục uploads
            $hinhAnh = $targetFile;  // Lưu tên đường dẫn tệp vào cơ sở dữ liệu
        }
    
        // Cập nhật câu lệnh SQL
        $sql = "INSERT INTO baiviet (tieuDe, ma_baiViet, moTa, trangThai, hinhAnh, mota_chitiet) 
                VALUES (:tieuDe, :ma_baiViet, :moTa, :trangThai, :hinhAnh, :mota_chitiet)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':tieuDe' => $tieuDe,
            ':ma_baiViet' => $ma_baiViet,
            ':moTa' => $moTa,
            ':trangThai' => $trangThai,
            ':hinhAnh' => $hinhAnh,  // Lưu tên đường dẫn hình ảnh
            ':mota_chitiet' => $mota_chitiet // Lưu mô tả chi tiết
        ]);
    }
    
    
    
    public function updateBlog($tieuDe, $moTa, $trangThai, $ma_baiViet) {
        $sql = "UPDATE baiviet SET tieuDe = :tieuDe, moTa = :moTa, trangThai = :trangThai WHERE ma_baiViet = :ma_baiViet";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':tieuDe' => $tieuDe,
            ':moTa' => $moTa,
            ':trangThai' => $trangThai,
            ':ma_baiViet' => $ma_baiViet
        ]);
    }
    
    
    public function deleteBlog($ma_baiViet) {
        $sql = "DELETE FROM baiviet WHERE ma_baiViet = :ma_baiViet";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ma_baiViet' => $ma_baiViet]);
    }
    public function getBlogById($ma_baiViet) {
        $sql = "SELECT * FROM baiviet WHERE ma_baiViet = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$ma_baiViet]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}