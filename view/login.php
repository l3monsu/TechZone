<?php
require_once "./model/pdo.php";

$db = new database();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email_nguoiDung'];
    $password = $_POST['matKhau'];

    $sql = "SELECT * FROM nguoidung WHERE email_nguoiDung = :email AND matKhau_nguoiDung = :password";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email, 'password' => $password]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['Ten_nguoiDung'] = $row['Ten_nguoiDung'];  // Lưu tên người dùng vào session
        $_SESSION['ma_nguoiDung'] = $row['ma_nguoiDung'];    // Lưu ma_nguoiDung vào session
        $_SESSION['vaiTro'] = $row['vaiTro'];                   // Lưu vaiTro vào session

        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Đăng nhập thành công!",
                text: "Chào mừng, ' . $_SESSION['Ten_nguoiDung'] . '! Chuyển hướng...",
                timer: 2000,
                showConfirmButton: false
            }).then(() => {';

        // Kiểm tra vaiTro và chuyển hướng
        if ($row['vaiTro'] == 1) {
            echo 'location.href = "http://localhost/Project1_Group-TechZone/admin/?mod=page&act=home";'; // Chuyển đến trang admin
        } elseif ($row['vaiTro'] == 0) {
            echo 'location.href = "http://localhost/Project1_Group-TechZone/index.php";'; // Chuyển đến trang user
        }

        echo '});
        </script>';
        exit();
    } else {
        // Đăng nhập thất bại
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Đăng nhập thất bại",
                text: "Email hoặc mật khẩu không đúng.",
                showConfirmButton: true
            });
        </script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>TechZone</title>
    <link rel="stylesheet" href="./public/DuAn_Group-4people/CSS/dangnhapp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<div class="form_dang_nhap_2">
    <div class="hinhform">
        <img style="width: 590px; height: 300px;" src="./public/DuAn_Group-4people/images/hinhform.png" alt="">
    </div>
    <form method="POST" onsubmit="return validateForm()">
        <h2>Đăng nhập</h2>
        <div>
            <p>Nếu bạn chưa có tài khoản,</p><a href="index.php?page=register" class="dang_ki" style="text-decoration: none;">đăng ký tại đây</a>
        </div>
        <input type="email" id="email_nguoiDung" name="email_nguoiDung" placeholder="Email" required>
        <input type="password" id="matKhau" name="matKhau" placeholder="Mật Khẩu" required>
        <input type="submit" value="Đăng nhập" id="successA" name="submit">
        <div class="quen_mat_khau"><a href="index.php?page=forgot-password">Quên mật khẩu</a></div>
        <div class="or">Hoặc đăng nhập bằng</div>
        <div class="social-login">
            <a href="" class="facebook">Facebook</a>
            <a href="" class="google">Google</a>
        </div>
    </form>
</div>

