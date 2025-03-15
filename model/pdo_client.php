<?php
// Kết nối database
class Database {
    private $servername = "localhost:3307";
    private $username = "root";
    private $password = "";
    private $dbname = "techzone";
    public $conn; // Biến lưu trữ kết nối đến database
    private $stmt; // Biến lưu trữ câu truy vấn

    // Hàm khởi tạo kết nối đến database
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
            exit;
        }
    }

    // Thực thi câu truy vấn SQL
    function query($sql, $param = []) {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute($param); 
        return $this->stmt;
    }
    
    // Chuẩn bị câu truy vấn SQL
    function prepare($query) {
        return $this->conn->prepare($query);
    }

    // Lấy tất cả bản ghi từ câu truy vấn SQL
    function getAll($sql, $param = [])
    {
        $stmt = $this->query($sql, $param);  // Gọi phương thức query để thực thi câu lệnh
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Trả về tất cả bản ghi dưới dạng mảng liên kết
    }
    

    // Lấy một bản ghi duy nhất từ câu truy vấn SQL
    function getOne($sql, $param = []) {
        $statement = $this->query($sql, $param);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    

    // Thực hiện câu truy vấn insert và trả về id của bản ghi vừa thêm
    function insert($sql, $param) {
        $this->query($sql, $param);
        return $this->conn->lastInsertId();
    }

    function update($sql, $param) {
        $stmt = $this->query($sql, $param);
        return $stmt->rowCount(); // Trả về số bản ghi bị ảnh hưởng
    }
    
    function delete($sql, $param) {
        $this->query($sql, $param);
    }

    // Đóng kết nối (không bắt buộc nhưng hữu ích trong một số trường hợp)
    public function closeConnection() {
        $this->conn = null;
    }
}
?>
