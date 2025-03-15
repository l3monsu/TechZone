<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>TechZone</title>
    <link rel="stylesheet" href="./public/DuAn_Group-4people/CSS/dangki.css">
</head>

<body style="background-color: rgb(255, 255, 255);">
    <div class="form_dang_nhap_2">
        <div class="hinhform">
            <img style="width: 590px; height: 300px;" src="./public/DuAn_Group-4people/images/hinhform.png" alt="">
        </div>
        <form action="index.php?page=signup" method="POST" onsubmit="return validateForm()">
            <h2>Đăng kí</h2>
            <div>
                <p>Đã có tài khoản:</p><a style="text-decoration: none;" href="index.php?page=login" class="dang_ki"> Đăng nhập tại đây</a>
            </div>
            <input type="text" id="Ho_nguoiDung" name="Ho_nguoiDung" placeholder="Họ">
            <input type="text" id="Ten_nguoiDung" name="Ten_nguoiDung" placeholder="Tên">
            <input type="email" id="email_nguoiDung" name="email_nguoiDung" placeholder="Email">
            <input type="tel" id="sDt" name="sDt" placeholder="Số điện thoại">
            <input type="password" id="matKhau_nguoiDung" name="matKhau" placeholder="Mật Khẩu">
            <input type="submit" value="Đăng ký" name="submit" id="successA">
            <div class="or">Hoặc đăng nhập bằng</div>
            <div class="social-login">
                <a href="https://m.facebook.com/login/?locale=vi_VN&refsrc=deprecated" class="facebook">Facebook</a>
                <a href="https://accounts.google.com/InteractiveLogin/signinchooser?hl=vi&ifkv=Af_xneFlvO-Khlwmzix0y_WZYDCnbN7JQeJew3wxMMf6Y3YVcfnxQd6L03o9Kaa9ll-jMFdcjvPnmg&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="google">Google</a>
                <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoidmkifQ%3D%3D%22%7D" class="twitter">Twitter</a>
            </div>
        </form>
    </div>
    <script>
        function validateForm() {
            let valid = true;
            let errorMessage = "";

            const hoNguoiDung = document.getElementById("Ho_nguoiDung").value.trim();
            if (hoNguoiDung === "") {
                errorMessage += "Họ không được để trống.\n";
                valid = false;
            }

            const tenNguoiDung = document.getElementById("Ten_nguoiDung").value.trim();
            if (tenNguoiDung === "") {
                errorMessage += "Tên không được để trống.\n";
                valid = false;
            }

            const emailNguoiDung = document.getElementById("email_nguoiDung").value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailNguoiDung === "") {
                errorMessage += "Email không được để trống.\n";
                valid = false;
            } else if (!emailPattern.test(emailNguoiDung)) {
                errorMessage += "Email không hợp lệ.\n";
                valid = false;
            }

            const soDienThoai = document.getElementById("sDt").value.trim();
            const phonePattern = /^[0-9]{10}$/;
            if (soDienThoai === "") {
                errorMessage += "Số điện thoại không được để trống.\n";
                valid = false;
            } else if (!phonePattern.test(soDienThoai)) {
                errorMessage += "Số điện thoại không hợp lệ.\n";
                valid = false;
            }

            const matKhau = document.getElementById("matKhau_nguoiDung").value.trim();
            if (matKhau === "") {
                errorMessage += "Mật khẩu không được để trống.\n";
                valid = false;
            } else if (matKhau.length < 6) {
                errorMessage += "Mật khẩu phải có ít nhất 6 ký tự.\n";
                valid = false;
            }

            if (!valid) {
                alert(errorMessage);
            }

            return valid;
        }
    </script>
</body>