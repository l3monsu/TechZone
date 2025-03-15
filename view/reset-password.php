<?php
// Kiểm tra mã reset từ URL
if (isset($_GET['code'])) {
    $resetCode = $_GET['code'];

    // Kiểm tra mã reset có hợp lệ hay không
    $isValid = $this->model->validateResetCode($resetCode);

    if ($isValid) {
        // Nếu mã hợp lệ, cho phép người dùng nhập mật khẩu mới
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_password'])) {
            // Lấy mật khẩu mới và mã reset
            $newPassword = $_POST['new_password'];
            
            // Thực hiện cập nhật mật khẩu trong cơ sở dữ liệu
            $this->model->resetPassword($resetCode, $newPassword);

            echo "Mật khẩu của bạn đã được thay đổi thành công!";
            // Có thể chuyển hướng người dùng tới trang đăng nhập sau khi cập nhật mật khẩu thành công
            header("Location: index.php?page=login");
            exit();
        }

        // Nếu chưa gửi form, hiển thị form nhập mật khẩu mới
        echo '<form method="POST" action="index.php?page=reset-password&code=' . htmlspecialchars($resetCode) . '">
                <label for="new_password">Mật khẩu mới:</label>
                <input type="password" id="new_password" name="new_password" placeholder="Mật khẩu mới" required>
                <input type="hidden" name="reset_code" value="' . htmlspecialchars($resetCode) . '">
                <input type="submit" value="Cập nhật mật khẩu" name="submit">
              </form>';
    } else {
        // Nếu mã không hợp lệ hoặc hết hạn
        echo "Mã reset không hợp lệ hoặc đã hết hạn.";
    }
} else {
    echo "Không có mã reset.";
}
?>
