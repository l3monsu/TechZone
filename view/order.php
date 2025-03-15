<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra nếu chưa đăng nhập
if (!isset($_SESSION['Ten_nguoiDung'])) {

    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<script>
        Swal.fire({
            icon: "warning",
            title: "Vui lòng đăng nhập",
            text: "Bạn cần đăng nhập để thực hiện đặt hàng.",
            timer: 1900,
            showConfirmButton: false
        }).then(() => {
            location.href = "index.php?page=login";
        });
    </script>';
    exit();
}
?>

<link rel="stylesheet" href="./public/DuAn_Group-4people/CSS/dhh.css">

<form id="orderForm" method="POST" action="index.php?page=order" style="margin-top: 45px;">
    <h3>Vui lòng nhập thông tin nhận hàng</h3>
    <input type="hidden" name="ma_donHang" value="<?php echo uniqid('DH'); ?>">
    <input type="hidden" name="tongTien" value="<?= number_format($totalPrice, 0, ',', '.') ?>">
    <input type="hidden" name="ngay" value="<?php echo date('Y-m-d H:i:s'); ?>">

    <label for="diaChi">Địa chỉ:</label>
    <input type="text" id="diaChi" name="diaChi" required placeholder="Nhập địa chỉ giao hàng">

    <label for="ten_nguoiDung">Họ và tên:</label>
    <input type="text" id="ten_nguoiDung" name="ten_nguoiDung" required placeholder="Nhập họ và tên">

    <label for="soDienThoai">Số điện thoại:</label>
    <input type="tel" id="soDienThoai" name="soDienThoai" required placeholder="Nhập số điện thoại" oninput="checkPhoneExistence()">

    <input type="hidden" name="ma_nguoiDung" value="<?php echo $_SESSION['ma_nguoiDung'] ?? '3'; ?>">
    <input type="hidden" name="ma_sanPham" value="1">

    <label for="ma_giamGia">Ưu đãi cho người mới (nếu có):</label>
    <input type="text" id="ma_giamGia" name="ma_giamGia" placeholder="Nhập mã giảm giá">

    <input type="hidden" name="trangThai" value="Đang xử lý">

    <div class="payment-options">
        <h4>Hình thức thanh toán</h4> <br>
        <label><input type="radio" name="payment" value="cash" checked> Thanh toán tiền mặt khi nhận hàng</label><br>
        <label><input type="radio" name="payment" value="bank_transfer"> Chuyển khoản ngân hàng</label>
    </div>

    <!-- Ngân hàng sẽ hiển thị khi chọn chuyển khoản -->
    <div id="bank-list" style="display: none;"> <br>
    </div>

    <!-- Hiển thị mã QR khi chọn ngân hàng -->
    <div id="qr-section" style="display: none;">
        <h4>Quét mã QR để thanh toán</h4>
        <img id="qr-image" src="./public/DuAn_Group-4people/images/ma_QR.jpg" alt="QR Code" style="width: 200px;">
        <p>Vui lòng quét mã QR để hoàn tất thanh toán.</p>
        <label><input type="checkbox" id="qr-scanned" disabled> Tôi đã quét mã QR.</label>
    </div>

    <button class="submit-btn" type="submit" name="place_order" id="submitBtn" `disabled`>Xác Nhận</button>
</form>


<div id="phoneError" style="color: red; display: none;">Số điện thoại này đã được đăng ký!</div>
<script>
    document.getElementById("orderForm").addEventListener("submit", function(event) {
        var phoneNumber = document.getElementById("soDienThoai").value;
        var submitButton = document.getElementById("submitBtn");
        var regex = /^\d{10,11}$/; // Kiểm tra số điện thoại có 10 hoặc 11 chữ số

        // Kiểm tra nếu số điện thoại không hợp lệ
        if (!regex.test(phoneNumber)) {
            event.preventDefault(); // Ngừng việc gửi form
            alert("Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại có 10 hoặc 11 chữ số.");
            return false;
        } else {
            // Nếu số điện thoại hợp lệ, form sẽ được gửi
            submitButton.disabled = false;
        }
    });

    //Xử lý thanh toán bằng ngân hàng
    document.querySelectorAll('input[name="payment"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            const bankList = document.getElementById('bank-list');
            const qrSection = document.getElementById('qr-section');
            const submitBtn = document.getElementById('submitBtn');

            if (this.value === 'bank_transfer') {
                // Hiển thị ngân hàng và mã QR khi chọn chuyển khoản ngân hàng
                bankList.style.display = 'block';
                qrSection.style.display = 'block';
                submitBtn.disabled = true; // Vô hiệu hóa nút Xác Nhận cho đến khi quét mã
            } else {
                // Ẩn ngân hàng và mã QR khi chọn tiền mặt
                bankList.style.display = 'none';
                qrSection.style.display = 'none';
                submitBtn.disabled = false; // Kích hoạt nút Xác Nhận khi chọn tiền mặt
            }
        });
    });

    // Lắng nghe sự kiện quét mã QR
    document.getElementById('qr-scanned').addEventListener('change', function() {
        const submitBtn = document.getElementById('submitBtn');
        // Kích hoạt nút Xác Nhận khi người dùng quét mã QR (checked)
        submitBtn.disabled = !this.checked;
    });
</script>