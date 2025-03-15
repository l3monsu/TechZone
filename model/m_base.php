<?php
class BaseModel {
    public $db;

    public function __construct() {
        try {
            $host = 'localhost:3307';
            $dbname = 'techzone';
            $username = 'root'; 
            $password = ''; 
            
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
        }
    }
}
