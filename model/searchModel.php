<?php
require_once './model/pdo_client.php';

class SearchModel
{
    private $db;

    public function __construct()
    {
        // Khởi tạo kết nối đến cơ sở dữ liệu
        $this->db = new Database();
    }

    public function getSearchResults($query) {
        // Nếu không có từ khóa tìm kiếm (trường hợp người dùng không nhập gì)
        if (empty($query)) {
            return [];  // Trả về mảng rỗng nếu không có từ khóa
        }
    
        // Sử dụng Prepared Statements để tránh SQL Injection
        $stmt = $this->db->conn->prepare("SELECT ten_sanPham, hinh_Anh, gia_sanPham, giamGia FROM sanpham WHERE ten_sanPham LIKE ?");
        $searchTerm = "%" . $query . "%";
        $stmt->execute([$searchTerm]);
        
        // Trả về kết quả dưới dạng mảng
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
