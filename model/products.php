<?php
    // lay tat ca san pham
    function get_products($ma_danhMuc=0,$start=0,$limit=0){
        global $conn;
        $sql = "SELECT s.*, d.ten_danhMuc,th.ten_thuongHieu
        FROM sanpham s 
        INNER JOIN danhmuc d ON s.ma_danhMuc = d.ma_danhMuc 
        INNER JOIN thuonghieu th ON s.ma_thuongHieu = th.ma_thuongHieu
        ORDER BY ma_sanPham DESC";
        if($ma_danhMuc!=0){
            $sql .= " WHERE s.ma_Danhmuc=".$ma_danhMuc;
        }
        if ($limit!=0) {
            $sql .= " LIMIT ".$start.",".$limit;
        }
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function search_products($keyword){
        global $conn;
        $sql = "SELECT * FROM sanpham s INNER JOIN danhmuc d ON s.ma_danhMuc = d.ma_danhMuc WHERE s.ten_sanPham LIKE '%".$keyword."%'";
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    // lấy id
    function get_product($id){
        global $conn;
        $sql = "SELECT s.*, d.ten_danhMuc FROM sanpham s INNER JOIN danhmuc d ON s.ma_danhMuc = d.ma_danhMuc WHERE s.ma_sanPham=".$id;
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();//chỉ lấy 1 sẩn phẩm
    }
    function count_product(){
        global $conn;
        $sql = "SELECT count(*) AS soLuong FROM sanpham";
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();//chỉ lấy 1 sẩn phẩm
    }
    //thêm sản phẩm
    function add_product($ten_sanPham, $hinh_Anh,$gia_sanPham, $giamGia,$moTa,$mauSac,$ban, $soLuong,$ten_thuongHieu, $ma_danhMuc ) {
        $conn = pdo_connect(); // Kết nối tới database
        $sql = "INSERT INTO sanpham 
                (`ten_sanPham`,`hinh_Anh`, `gia_sanPham`, `giamGia`, `moTa`,`mauSac`, `ban`, `soLuong`,`ten_thuongHieu` ,`ma_danhMuc`) 
                VALUES (:ten_sanPham,:hinh_Anh, :gia_sanPham, :giamGia, :moTa,:mauSac, :ban, :soLuong,:ten_thuongHieu, :ma_danhMuc) ORDER BY ma_sanPham  " ;
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":ten_sanPham", $ten_sanPham);
            $stmt->bindParam(":hinh_Anh", $hinh_Anh);
            $stmt->bindParam(":gia_sanPham", $gia_sanPham);
            $stmt->bindParam(":giamGia", $giamGia);
            $stmt->bindParam(":moTa", $moTa);
            $stmt->bindParam(":mauSac", $mauSac);
            $stmt->bindParam(":ban", $ban);
            $stmt->bindParam(":soLuong", $soLuong);
            $stmt->bindParam(":ten_thuongHieu", $soLuong);
            $stmt->bindParam(":ma_danhMuc", $ma_danhMuc);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi thêm sản phẩm: " . $e->getMessage();
            return false;
        }
    }
   //sửa sản phẩm
   function edit_product($ma_sanPham, $hinh_Anh,$ten_sanPham, $gia_sanPham, $giamGia, $moTa, $mauSac,$ban, $soLuong,$ten_thuongHieu, $ma_danhMuc){
    $conn = pdo_connect();
    $sql = "UPDATE sanpham SET 
        `ten_sanPham`=:ten_sanPham, 
        `hinh_Anh`=:hinh_Anh, 
        `gia_sanPham`=:gia_sanPham, 
        `giamGia`=:giamGia, 
        `moTa`=:moTa, 
        `mauSac`=:mauSac,
        `ban`=:ban, 
        `soLuong`=:soLuong, 
        `ten_thuongHieu`=:ten_thuongHieu,
        `ma_danhMuc`=:ma_danhMuc 
        WHERE `ma_sanPham`=:ma_sanPham";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":ma_sanPham", $ma_sanPham);
        $stmt->bindParam(":ten_sanPham", $ten_sanPham);
        $stmt->bindParam(":hinh_Anh", $hinh_Anh);
        $stmt->bindParam(":gia_sanPham", $gia_sanPham);
        $stmt->bindParam(":giamGia", $giamGia);
        $stmt->bindParam(":moTa", $moTa);
        $stmt->bindParam(":mauSac", $mauSac);
        $stmt->bindParam(":ban", $ban);
        $stmt->bindParam(":soLuong", $soLuong);
        $stmt->bindParam(":ten_thuongHieu", $ten_thuongHieu);
        $stmt->bindParam(":ma_danhMuc", $ma_danhMuc);
        $stmt->execute(); // Thực thi lệnh SQL
        return true;
    } catch (PDOException $e) {
        echo "Lỗi cập nhật sản phẩm: " . $e->getMessage();
        return false;
    }
}

    //xoá sản phẩm
    function delete_Product($ma_sanPham){
        $conn = pdo_connect();


        $sql = "DELETE FROM hinhanh WHERE ma_sanPham = :ma_sanPham";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":ma_sanPham", $ma_sanPham);
        $stmt->execute();

        $sql = "DELETE FROM sanpham WHERE ma_sanPham=:ma_sanPham";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":ma_sanPham",$ma_sanPham);
        return $stmt->execute();
    }