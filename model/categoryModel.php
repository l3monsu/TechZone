<?php 
class categoryModel{
    private $db;
    public function __construct()
    {
        require_once './model/pdo_client.php';
        $this->db = new database();
    }
    public function getdanhmuc()
    {
        $sql = "SELECT * FROM danhmuc limit 9";
        return $this->db->getAll($sql);
    }
    public function getdanhmuchead()
    {
        $sql = "SELECT * FROM danhmuc limit 8";
        return $this->db->getAll($sql);
    }
    public function getthuonghieu()
    {
        $sql = "SELECT * FROM thuonghieu limit 7 ";
        return $this->db->getAll($sql);
    }
    public function getBrandByCategory($ma_danhMuc)
    {
        $sql = "
        SELECT DISTINCT th.* 
        FROM thuonghieu th 
        JOIN sanpham sp ON th.ma_thuongHieu = sp.ma_thuongHieu
        WHERE sp.ma_danhMuc = ? 
        ";
        return $this->db->query($sql, [$ma_danhMuc])->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>


