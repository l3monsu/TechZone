<?php
include_once "../../Project1_Group-TechZone/model/pdo.php";

// Lấy toàn bộ danh sách người dùng
function user_getAll() {
    $sql = "SELECT * FROM nguoidung ORDER BY ma_nguoiDung DESC";
    return pdo_getAll($sql);
}

// Lấy thông tin người dùng theo ID
function get_userById($id) {
    global $conn;
    $sql = "SELECT * FROM nguoidung WHERE ma_nguoiDung = ".$id;
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch();//chỉ lấy 1 sẩn phẩm
}

// Cập nhật thông tin người dùng
function edit_user( $ma_nguoiDung,$ten_nguoiDung,$matKhau_nguoiDung, $email_nguoiDung, $sDt_nguoiDung, $vaiTro, $trang_Thai) {
    $conn = pdo_connect();
    $sql = "UPDATE nguoidung 
            SET `ten_nguoiDung` = :ten_nguoiDung,
             `email_nguoiDung` = :email_nguoiDung,
             `matKhau_nguoiDung` = :matKhau_nguoiDung,
              `sDt_nguoiDung` =:sDt_nguoiDung ,
               `vaiTro` = :vaiTro,
                `trang_Thai` = :trang_Thai
            WHERE `ma_nguoiDung` = :ma_nguoiDung";
   try{
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":ma_nguoiDung", $ma_nguoiDung);
    $stmt->bindParam(":ten_nguoiDung", $ten_nguoiDung);
    $stmt->bindParam(":matKhau_nguoiDung", $matKhau_nguoiDung);
    $stmt->bindParam(":email_nguoiDung", $email_nguoiDung);
    $stmt->bindParam(":sDt_nguoiDung", $sDt_nguoiDung);
    $stmt->bindParam(":vaiTro", $vaiTro);
    $stmt->bindParam(":trang_Thai", $trang_Thai);
    $stmt->execute(); // Thực thi lệnh SQL
    return true;
} catch (PDOException $e) {
    echo "Lỗi cập nhật  " . $e->getMessage();
    return false;
}
}
function updateUserStatus($id, $newStatus) {
    global $conn; // Kết nối cơ sở dữ liệu
    $stmt = $conn->prepare("UPDATE nguoidung SET trang_Thai = ? WHERE ma_nguoiDung = ?");
    $stmt->execute([$newStatus, $id]);
}

// Ẩn người dùng (Cập nhật trạng thái thành 1 - bị ẩn)
function user_hide($id) {
    $sql = "UPDATE nguoidung SET trang_Thai = 1 WHERE ma_nguoiDung = ?";
    pdo_execute($sql, [$id]);
}
function search_user($keyword){
    global $conn;
    $sql = "SELECT * FROM nguoidung nd  WHERE nd.ten_nguoiDung LIKE '%".$keyword."%'";
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
function updateUserStatusRole($id, $newStatus) {
    global $conn; // Kết nối cơ sở dữ liệu
    $stmt = $conn->prepare("UPDATE nguoidung SET vaiTro = ? WHERE ma_nguoiDung = ?");
    $stmt->execute([$newStatus, $id]);
}