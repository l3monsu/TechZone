<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalPrice = 0; // Tổng tiền
?>

<div class="container">
    <link rel="stylesheet" href="./public/DuAn_Group-4people/CSS/cartt.css">
    <div class="header">
        <h2>Giỏ Hàng</h2>
    </div>

    <div class="delivery-method">
        <label><input type="radio" name="delivery" value="delivery" checked> Giao tận nơi</label>
        <label><input type="radio" name="delivery" value="pickup"> Nhận tại siêu thị</label>
    </div>

    <div class="locationcart">
        <label for="locationcart">Vui lòng cung cấp thông tin nhận hàng:</label>
        <select id="locationcart" name="location">
            <option>Hồ Chí Minh</option>
            <option>An Giang</option>
            <option>Long An</option>
            <option>Vĩnh Long</option>
            <option>Nghệ An</option>
            <option>Hà Nội</option>
        </select>
    </div>
    <br>
    <?php if (!empty($cart)) : ?>
        <?php foreach ($cart as $productId => $item) : ?>
            <div class="product">
                <img src="./public/DuAn_Group-4people/images/<?= ($item['image']) ?>" alt="<?= ($item['name']) ?>" style="width:120px;">
                <div class="product-details">
                    <h3><?= ($item['name']) ?></h3>
                    <select class="bot" name="color">
                        <option><?= ($item['color']) ?></option>
                    </select>
                    <p class="bot" style="color: rgb(61, 61, 190); margin-left:2px;">Online giá rẻ quá</p>
                    <p class="masale" style="margin-top: 10px;">- Nhập mã VNPAYTGDG5 giảm từ 50,000đ đến 200,000đ (áp dụng tùy giá trị đơn hàng) khi thanh toán qua VNPAY-QR.</p>
                </div>
                <div class="product-price"><?= number_format($item['price'], 0, ',', '.') ?>đ</div>
                <div class="quantity-container">
                    <form method="POST" action="index.php?page=update-cart">
                        <input type="hidden" name="product_id" value="<?= $productId ?>">
                        <button class="quantity-btn minus" name="action" value="decrease">−</button>
                        <span class="quantity"><?= $item['quantity'] ?></span>
                        <button class="quantity-btn plus" name="action" value="increase">+</button>
                        <button class="delete-btn" name="action" value="delete">Xóa</button>
                    </form>
                </div>
            </div>
            <?php $totalPrice += $item['price'] * $item['quantity']; ?>
        <?php endforeach; ?>

        <div class="textcart">
            <p>Tạm tính (<?= count($cart) ?> sản phẩm):</p>
            <p><?= number_format($totalPrice, 0, ',', '.') ?>đ</p>
        </div>
    <?php else : ?>
        <p>Giỏ hàng của bạn đang trống.</p>
    <?php endif; ?>
</div>

<div class="container2">
    <div class="special-requests">
        <h3>Yêu cầu đặc biệt:</h3>
        <label><input type="checkbox" name="request[]" value="data_transfer"> Chuyển danh bạ, dữ liệu qua máy mới</label><br>
        <label><input type="checkbox" name="request[]" value="invoice"> Xuất hóa đơn công ty</label><br>
        <label><input type="checkbox" name="request[]" value="other"> Yêu cầu khác</label>
    </div>
</div>

<div class="container3">
    <div class="option">
        <label>Sử dụng mã giảm giá</label>
        <input type="text" name="coupon" placeholder="Nhập mã giảm giá">
        <button type="submit" name="apply_coupon">Sử dụng</button>
    </div>
    <div class="option">
        <label>Dùng điểm Quà Tặng VIP</label>
        <input type="text" name="vip_points" placeholder="Nhập số điểm">
        <button type="submit" name="apply_points">Sử dụng</button>
    </div>
    <div class="sum">
        <p class="sum1">Tổng tiền: <span><?= number_format($totalPrice, 0, ',', '.') ?>₫</span></p>
        <p class="give">Điểm Quà Tặng VIP tích lũy: <span><?= number_format($totalPrice / 1000) ?> điểm</span></p>
    </div>
</div>

<div class="container4" style="height: 140px;">
    <div class="terms">
        <label><input type="checkbox" name="agree" required> Tôi đồng ý với <a href="">Chính sách xử lý dữ liệu cá nhân</a> của TechZone.com</label>
    </div>
    <a href="index.php?page=order"><button class="submit-btn" type="submit" name="place_order">Đặt hàng</button></a>

</div>