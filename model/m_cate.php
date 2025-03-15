<?php
require_once '../../Project1_Group-TechZone/model/m_base.php';
$model = new BaseModel();
class m_Category {
    public $db;
    public function __construct() {
        $baseModel = new BaseModel();
        $this->db = $baseModel->db; 
    }
    public function addCategory($ten_danhMuc, $soLuong) {
        $sql = "INSERT INTO danhmuc (ten_danhMuc, soLuong) VALUES (:ten_danhMuc, :soLuong)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ten_danhMuc' => $ten_danhMuc, ':soLuong' => $soLuong]);
    }
    
    public function updateCategory($ma_danhMuc, $ten_danhMuc, $soLuong) {
        $sql = "UPDATE danhmuc SET ten_danhMuc = :ten_danhMuc, ma_danhMuc = :ma_danhMuc WHERE soLuong = :soLuong";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ma_danhMuc' => $ma_danhMuc, ':ten_danhMuc' => $ten_danhMuc, ':soLuong' => $soLuong]);
    }
    
    public function deleteCategory($ma_danhMuc) {
        $sql = "DELETE FROM sanpham WHERE ma_danhMuc = :ma_danhMuc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ma_danhMuc' => $ma_danhMuc]);

        $sql = "DELETE FROM danhmuc WHERE ma_danhMuc = :ma_danhMuc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':ma_danhMuc' => $ma_danhMuc]); 
    }
    public function getAllCategories() {
        $stmt = $this->db->prepare("SELECT * FROM danhmuc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByCategory($ma_danhMuc) {
        $stmt = $this->db->prepare("SELECT * FROM sanpham WHERE ma_danhMuc = :ma_danhMuc");
        $stmt->bindParam(':ma_danhMuc', $ma_danhMuc, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchCategory($keyword, $column){
    $sql = "SELECT * FROM danhmuc WHERE $column LIKE ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(["%$keyword%"]);
    $this->db = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_danhmuc() {
    $conn = pdo_connect();
    $sql = "SELECT * FROM danhmuc";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
