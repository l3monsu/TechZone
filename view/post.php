<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="./public/DuAn_Group-4people/CSS/post.css">
</head>
<!-- ---------------------------Phần giỏ hàng---------------------------- -->
<?php
require_once './model/productModel.php';
$product = new ProductModel();
$listPro = $product->getPost();
foreach ($listPro as $item) {
    extract($item);
    echo '<main class="content">
    <div class="container">
        <article class="post">
            <h1 class="post-title">'.$tieuDe.'</h1>
            <p class="post-meta">Đăng bởi <strong>Admin</strong> vào ngày '. $ngayKhoitao.'</p>
            <img src="./public/DuAn_Group-4people/images/' . $hinhAnh . '" alt="Hình minh họa" class="post-image">
            <p class="post-body">
                '. $moTa .'
            </p>
            <p class="post-body">
              '. $mota_chitiet .'
            </p>
        </article>
    </div>
</main>';
}
?>
<!-- <main class="content">
    <div class="container">
        <article class="post">
            <h1 class="post-title">Tiêu Đề Bài Viết</h1>
            <p class="post-meta">Đăng bởi <strong>Admin</strong> vào ngày 19/11/2024</p>
            <img src="https://via.placeholder.com/800x400" alt="Hình minh họa" class="post-image">
            <p class="post-body">
                Đây là nội dung bài viết. Bạn có thể thêm bất kỳ văn bản hoặc nội dung nào tại đây.
                Nội dung này có thể bao gồm các đoạn văn, danh sách, hình ảnh và hơn thế nữa.
            </p>
            <p class="post-body">
                Đây là đoạn văn thứ hai để minh họa cách bố cục bài viết.
            </p>
        </article>
    </div>
</main> -->
<div class="comment-section">
        <div class="comment">
            <div class="comment-author">vin</div>
            <div class="comment-time">Đăng vào: 2024-11-28</div>
            <div class="comment-text">Sản phẩm này rất tốt</div>
        </div>
        <div class="add-comment">
            <textarea placeholder="Viết bình luận ..."></textarea>
            <button>Đăng</button>
        </div>
    </div>