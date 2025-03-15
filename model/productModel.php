<?php
class ProductModel
{
    private $conn;
    private $db;
    public function __construct()
    {
        require_once './model/pdo.php';
        $this->db = new database();
    }

    public function getProduct() // Sản phẩm khuyến mãi
    {
        $sql = "SELECT * FROM sanpham ORDER BY ma_sanPham DESC limit 15";
        return $this->db->getAll($sql);
    }
    public function getHotProduct() // lấy sản phẩm xu hướng
    {
        $sql = "SELECT * FROM sanpham Where ban >= 10 LIMIT 4";
        return $this->db->getAll($sql);
    }
    public function getProductNew() // lấy sản phẩm gợi ý hôm nay
    {
        $sql = "SELECT * FROM sanpham ORDER BY ma_sanPham DESC limit 15";
        return $this->db->getAll($sql);
    }
    public function getProductID($id) // lấy chi tiết
    {
        $sql = "SELECT * FROM sanpham WHERE ma_sanPham = $id";
        return $this->db->getOne($sql);
    }
    // public function getProductCate($idCate) // Sản phẩm danh mục
    // {
    //     $sql = "SELECT * FROM sanpham WHERE ma_danhMuc = $idCate ORDER BY ma_sanPham ASC";
    //     return $this->db->query($sql);
    // }
    
    // Sản phẩm danh mục
    public function getProductCate($ma_danhMuc)
    {
        $sql = "SELECT * FROM sanpham WHERE ma_danhMuc = ? ORDER BY ma_sanPham ASC";
        return $this->db->query($sql, [$ma_danhMuc])->fetchAll(PDO::FETCH_ASSOC);
    }
    // Sản phẩm theo thương hiệu
    public function getProductBrand($ma_thuongHieu)
    {
        $sql = "SELECT * FROM sanpham WHERE ma_thuongHieu = ? ORDER BY ma_thuongHieu ASC";
        return $this->db->query($sql, [$ma_thuongHieu])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPost() // Bài viết
    {
        $sql = "SELECT * FROM baiviet ORDER BY ma_baiViet DESC";
        return $this->db->getAll($sql);
    }
    // Hàm lấy sản phẩm theo danh mục và sắp xếp
    public function getProductCateOrder($ma_danhMuc, $orderBy) {
        $sql = "SELECT * FROM sanpham WHERE ma_danhMuc = :ma_danhMuc ORDER BY $orderBy";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ma_danhMuc', $ma_danhMuc, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Sản phẩm liên quan
    public function getProductLienquan($current_product_id)
    {
        $sql = "SELECT * 
            FROM sanpham 
            WHERE ma_danhMuc = (
                SELECT ma_danhMuc 
                FROM sanpham 
                WHERE ma_sanPham = :current_product_id
            )
            AND ma_sanPham != :current_product_id
            ORDER BY RAND()
            LIMIT 5";

        // Thực thi câu lệnh SQL
        $stmt = $this->db->prepare($sql); // Dùng $this->db thay vì $this->conn
        $stmt->bindParam(':current_product_id', $current_product_id, PDO::PARAM_INT);
        $stmt->execute();

        // Trả về kết quả
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
