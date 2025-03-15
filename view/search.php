<div class="search-results">
    <h2 style="text-align: center;margin-top:30px;">Kết quả tìm kiếm</h2 >
    <?php if (!empty($results)) : ?>
        <div class="product-grid" style="margin-top:40px;">
            <?php foreach ($results as $product) : ?>
                <div class="product-item">
                    <h3><?= ($product['ten_sanPham']) ?></h3>
                    <img src=" ./public/DuAn_Group-4people/images/<?= ($product['hinh_Anh']) ?>" alt="<?= ($product['ten_sanPham']) ?>" style="width:200px;">
                    <p style="color:red;font-weight:bold;">Giá: <?= number_format($product['gia_sanPham']) ?> VNĐ</p>
                    <p>Giá gốc:<del> <?= number_format($product['giamGia']) ?>đ</del></p>
                    <button type="submit" class="buy-nowhome">Mua ngay</button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>Không tìm thấy sản phẩm phù hợp.</p>
    <?php endif; ?>
</div>
<style>
    .product-grid {
        margin: 0px auto;
    width: 1250px;
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 sản phẩm mỗi hàng */
    gap: 20px; 
    
}

.product-item {
    border: 1px solid #ddd;
    padding: 15px;
    text-align: center;
    background-color: #f9f9f9;
    /* width: 80%; */
}

.product-item img {
    width: 100%;
    height: auto;
    margin-bottom: 15px;
}

.product-item h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.product-item p {
    margin-bottom: 10px;
}

@media (max-width: 1200px) {
    .product-grid {
        grid-template-columns: repeat(3, 1fr); /* 3 sản phẩm mỗi hàng */
    }
}

@media (max-width: 900px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 sản phẩm mỗi hàng */
    }
}

@media (max-width: 600px) {
    .product-grid {
        grid-template-columns: 1fr; /* 1 sản phẩm mỗi hàng */
    }
}

</style>