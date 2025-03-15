<?php
class ReportModel extends BaseModel {
    public function getTotalRevenue() {
        $query = "SELECT SUM(tongTien) AS total_revenue FROM donhang"; // Bảng Đơn Hàng
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_revenue'];
    }

    public function getMonthlyRevenue() {
        $query = "SELECT SUM(tongTien) AS monthly_revenue FROM donhang WHERE MONTH(ngay) = MONTH(CURRENT_DATE)";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['monthly_revenue'];
    }

    public function getInventoryData() {
        $query = "SELECT ten_sanPham, soLuong FROM sanpham WHERE soLuong > 20";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOutOfStockData() {
        $query = "SELECT ten_sanPham FROM sanPham WHERE soLuong = 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRevenueByCategory() {
        $query = "SELECT 
                    danhmuc.ten_danhMuc, 
                    MONTH(donhang.ngay) AS month,
                    SUM(donhang.tongTien) AS revenue
                  FROM donhang
                  JOIN sanpham ON donhang.ma_sanPham = sanpham.ma_sanPham
                  JOIN danhmuc ON sanpham.ma_danhMuc = danhmuc.ma_danhMuc
                  WHERE YEAR(donhang.ngay) = YEAR(CURRENT_DATE)  -- Lọc theo năm hiện tại
                  GROUP BY danhmuc.ten_danhMuc, MONTH(donhang.ngay)
                  ORDER BY MONTH(donhang.ngay)";  // Sắp xếp theo tháng
        $stmt = $this->db->prepare($query);
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
