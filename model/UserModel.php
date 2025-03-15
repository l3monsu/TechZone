<?php
class UserModel{
    private $db = null;
    private $user = null;
    private $model;

    public function __construct()
    {
        require_once(__DIR__ . '/pdo.php');
        $this->db = new Database();
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM nguoidung";
        return $this->db->getAll($sql);
    }
    function signUp($data)
    {
        $sql = "INSERT INTO nguoidung (Ten_nguoiDung, Ho_nguoiDung, email_nguoiDung, sDt_nguoiDung, matKhau_nguoiDung) VALUES (?, ?, ?, ?, ?)";
        $param = [$data['Ten_nguoiDung'], $data['Ho_nguoiDung'], $data['email_nguoiDung'], $data['sDt_nguoiDung'], $data['matKhau_nguoiDung']];
        return $this->db->insert($sql, $param);
    }

    // -------------------------------------------------------------------------//
    public function getUserInfo($ma_nguoiDung)
    {
        // Kiểm tra xem ma_nguoiDung có hợp lệ hay không
        if (empty($ma_nguoiDung)) {
            return false; // Trả về false nếu không có ma_nguoiDung
        }
    
        $query = "SELECT * FROM nguoidung WHERE ma_nguoiDung = ?";
        $params = array($ma_nguoiDung);
        $result = $this->db->getOne($query, $params);
    
        if (!$result) {
            // Nếu không có thông tin người dùng, trả về false
            return false;
        }
    
        // Kiểm tra role và chuyển hướng
        if ($result['role'] == 1) {
            header("Location:../Project1_Group-TechZone/admin/?mod=page&act=home");
            exit(); // Dừng script sau khi chuyển hướng
        } elseif ($result['role'] == 0) {
            header("Location: ../Project1_Group-TechZone/index.php?page=index");
            exit();
        }
    
        return $result;
    }
    

    // -----------------------------------------------------------------------------//

    
}
