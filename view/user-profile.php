<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['ma_nguoiDung'])) { // Kiểm tra người dùng đã đăng nhập chưa
    require_once './model/UserModel.php';
    $userModel = new UserModel();

    // Lấy thông tin người dùng
    $userInfo = $userModel->getUserInfo($_SESSION['ma_nguoiDung']);
}
?>
<div class="container">
    <?php if (isset($userInfo) && $userInfo): ?>
        <h2>Thông tin của bạn</h2>
        <p><strong>Tên người dùng: </strong> <?php echo ($userInfo['Ten_nguoiDung']); ?></p>
        <p><strong>Email: </strong> <?php echo ($userInfo['email_nguoiDung']); ?></p>
        <p><strong>Số điện thoại: </strong> <?php echo ($userInfo['sDt_nguoiDung']); ?></p>
    <?php else: ?>
        <p>Không tìm thấy thông tin người dùng. Vui lòng đăng nhập.</p>
        <p><a href="index.php?page=login">Đăng nhập tại đây</a></p>
    <?php endif; ?>
</div>
<style>
    .container {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        font-family: Arial, sans-serif;
        color: #333;
        border: 1px solid #f0f0f0;
    }

    h2 {
        text-align: center;
        color: #f39c12; /* Match the yellow-orange color of the header */
        margin-bottom: 20px;
        font-size: 24px;
    }

    p {
        font-size: 16px;
        line-height: 1.6;
        margin: 10px 0;
    }

    strong {
        color: #333;
    }

    a {
        color: #f39c12; /* Match the yellow-orange color for links */
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        h2 {
            font-size: 20px;
        }

        p {
            font-size: 14px;
        }
    }
</style>
