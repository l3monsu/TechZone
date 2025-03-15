<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<title>TechZone</title>
<link rel="stylesheet" href="./public/DuAn_Group-4people/CSS/product.css">
<link rel="stylesheet" href="./public/DuAn_Group-4people/js/script.js">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<?php
require_once './model/productModel.php';
if (isset($_GET['id'])) {
    $idsp = $_GET['id'];
    $productcate = new ProductModel();
    $procate = $productcate->getProductID($idsp);
    if ($idsp == $procate['ma_sanPham']) {


?>
        <div class="my-product" style="margin-top:10px">

            <div class="container-show-product">
                <div class="title-product">
                    <span style="width: 38%; font-size: 19px; font-weight: 600;"><?= $procate['ten_sanPham'] ?></span>
                    <div class="icon" style="width: 47%;">
                        <i class='bx bx-star'></i>
                        <i class='bx bx-star'></i>
                        <i class='bx bx-star'></i>
                        <i class='bx bx-star'></i>
                        <i class='bx bx-star'></i>
                        <a href="" style="text-decoration: none; font-size: 12px;">72 đánh giá</a>
                    </div>
                    <div class="like" style="display: flex; gap: 10px; width: 16%;">
                        <div><i class='bx bx-like'></i>&nbspThích 0</div>
                        <div>Chia sẻ</div>
                    </div>
                </div>
                <div class="slide-product">
                    <div class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img id="main-image" src="./public/DuAn_Group-4people/images/<?= $procate['hinh_Anh'] ?>" class="d-block w-10" alt="..." style="width:450px">
                            </div>
                        </div>
                        <div style="padding: 0.5rem; display: flex; justify-content: center"><a href="">Xem tất cả điểm nổi
                                bật</a> &nbsp (8/10)</div>
                        <div class="image-product">
                            <div class="container-image">
                                <div class="image"><i class="bx bx-medal"></i></div>Điểm nổi bật
                            </div>
                            <div class="container-image">
                                <div class="image"><img class="thumbnail" src="./public/DuAn_Group-4people/images/<?= $procate['hinh_Anh'] ?>" alt="">
                                </div>
                            </div>
                            <div class="container-image">
                                <div class="image"><img class="thumbnail" src="./public/DuAn_Group-4people/images/<?= $procate['hinhcon1'] ?>" alt="">
                                </div>
                            </div>
                            <div class="container-image">
                                <div class="image"><img class="thumbnail" src="./public/DuAn_Group-4people/images/<?= $procate['hinhcon2'] ?>" alt="">
                                </div>
                            </div>
                            <div class="container-image">
                                <div class="image"><img class="thumbnail" src="./public/DuAn_Group-4people/images/<?= $procate['hinhcon3'] ?>" alt="">
                                </div>
                            </div>
                            <div class="container-image">
                                <div class="image"><i class="bx bx-camera"></i></div>Chụp từ camera
                            </div>
                            <div class="container-image">
                                <div class="image"><i class="bx bx-archive"></i></div>Thông số kỹ thuật
                            </div>
                            <div class="container-image">
                                <div class="image"><i class="bx bx-edit-alt"></i></div>Thông tin sản phẩm
                            </div>
                        </div>
                        <div class="guarantee">
                            <div><i class="bx bx-cube"></i>Hư gì đổi nấy 12 tháng tại 3362 siêu thị toàn quốc (miễn phí
                                tháng đầu)</div>
                            <div><i class="bx bx-check-shield"></i>Bảo hành chính hãng điện thoại 1 năm tại các trung tâm
                                bảo hành hãng</div>
                        </div>
                        <div class="product-information" style="margin-top:120px">
                            <div class="title" style="font-weight: 600;">Thông tin sản phẩm</div>
                            <p style="font-weight: 400;"><span style="color: rgb(0, 108, 216);"><?= $procate['ten_sanPham'] ?></span> là một sản phẩm công nghệ không còn xa lạ với những người yêu công nghệ.
                                Máy vừa được giới thiệu với nhiều tính năng và công nghệ nổi bật, đánh dấu một bước tiến đột
                                phá của Iphone trong năm 2024, nhằm tạo nên một thương hiệu hàng đầu trong ngành.</p>
                            <!-- <p style="font-weight: 400;">Thiết kế sang trọng cùng những đường nét tinh xảo</p>
                            <p style="font-size: 16px;">Iphone 15 thường sẽ được sử dụng lối thiết kế bo cong ở mặt lưng
                                cùng kiểu màn hình vô cực ở hai bên, thân máy thì sẽ được làm chủ yếu từ vật liệu cao cấp
                                như mặt lưng kính phủ nhám vì, thế Iphone 15 trông mạnh mẽ, cá tính hơn đồng thời
                                mang đến khả năng chống xước, chống bám vân tay, hạn chế bám bụi tốt.</p> -->
                            <button>Xem thêm <i class="bx bxs-right-arrow"></i></button>
                        </div>
                    </div>

                    <div class="select">
                        <div class="configuration">
                            <div>8GB - 256GB</div>
                            <div style="border: 1px solid rgb(0, 108, 216);">12GB - 512GB</div>
                        </div>
                        <div class="configuration">
                            <div style="border: 1px solid rgb(0, 108, 216);">Hồng nhạt</div>
                            <div>Xanh lá</div>
                            <div>Tím</div>
                            <div>Xanh dương</div>
                        </div>
                        <div class="price">
                            <div class="title"><span>Giá tại:&nbsp</span><a href="">Hồ Chí Minh<i
                                        class='bx bx-chevron-down'></i></a></div>
                            <div class="my-card">
                                <div class="title">
                                    <div>Online Giá Rẻ Quá</div>
                                    <div>Kết thúc vào</div>
                                </div>
                                <div class="title">
                                    <div style="font-size: 25px; font-weight: 600;"><?= number_format($procate['gia_sanPham']) ?>đ</div>
                                    <div>23:00 | 15/12</div>
                                </div>
                                <div class="title">
                                    <div style="font-size: 14px; text-decoration-line: line-through;"><?= number_format($procate['giamGia']) ?>đ</div>
                                    <div>Tại <b>Hồ Chí Minh</b></div>
                                </div>
                                <div class="my-card-1">
                                    <span style="font-weight: 600; font-size: 16px;">Khuyến mãi</span>
                                    <span>-Tặng gói bảo hiểm rơi vỡ 6 tháng (PVI) <a href="">Xem chi tiết</a></span>
                                    <span>-Ưu đãi 4 tháng Youtube Premium <a href="">Xem chi tiết</a></span>
                                    <span>-Nhập mã MMTGDD giảm tối đa 100.000đ khi thanh toán qua MOMO</span>
                                    <li>Giao hàng nhanh chóng (tuỳ khu vực)</li>
                                    <li>Mỗi số điện thoại chỉ mua 3 sản phẩm trong 1 tháng</li>
                                    <li>Giá và khuyến mãi có thể kết thúc sớm</li>
                                    <div class="address">
                                        <a href=""><i class='bx bx-map'></i>Chọn địa chỉ nhận hàng</a>
                                        &nbspđể biết thời gian giao
                                    </div>
                                    <div class="buy-now">
                                        <button>Mua Ngay</button>
                                        <form action="index.php?page=add-to-cart" method="POST">
                                            <input type="hidden" name="product_id" value="<?= $procate['ma_sanPham'] ?>">
                                            <input type="hidden" name="product_name" value="<?= $procate['ten_sanPham'] ?>">
                                            <input type="hidden" name="product_price" value="<?= number_format($procate['gia_sanPham']) ?>">
                                            <input type="hidden" name="product_price" value="<?= number_format($procate['giamGia']) ?>">
                                            <input type="hidden" name="product_image" value="<?= $procate['hinh_Anh'] ?>">
                                            <input type="hidden" name="quantity" value="1"> <!-- Số lượng mặc định là 1 -->
                                            <button type="submit" class="addcart">Thêm vào giỏ hàng</button>
                                        </form>
                                        <div class="buy-now-1 py-2">
                                            <button>MUA TRẢ GÓP <br>Duyệt hồ sơ trong 5 phút</button>
                                            <button>MUA TRẢ GÓP <br>Visa, Mastercard, JCB, Amex</button>
                                        </div>
                                    </div>
                                    <div class="contact">Gọi đặt mua&nbsp <a href="">1800.1060</a>&nbsp(7:30 - 22:00)</div>
                                </div>
                            </div>
                            <div class="parameter-title">
                                Cấu hình <?= $procate['ten_sanPham'] ?>
                            </div>
                            <div class="parameter-content" style="background-color: #f5f5f5;">
                                <div>Màn hình:</div>
                                <div>Dynamic AMOLED 2X6.8"Quad HD+ (2K+)</div>
                            </div>
                            <div class="parameter-content">
                                <div>Hệ điều hành:</div>
                                <div>IOS 13</div>
                            </div>
                            <div class="parameter-content" style="background-color: #f5f5f5;">
                                <div>Camera sau:</div>
                                <div>Chính 200 MP & Phụ 12 MP, 10 MP, 10 MP</div>
                            </div>
                            <div class="parameter-content">
                                <div>Camera trước:</div>
                                <div>12 MP</div>
                            </div>
                            <div class="parameter-content" style="background-color: #f5f5f5;">
                                <div>Chip:</div>
                                <div>Snapdragon 8 Gen 2 </div>
                            </div>
                            <div class="parameter-content">
                                <div>RAM:</div>
                                <div>12 GB</div>
                            </div>
                            <div class="parameter-content" style="background-color: #f5f5f5;">
                                <div>Dung lượng lưu trữ:</div>
                                <div>512 GB</div>
                            </div>
                            <div class="parameter-content">
                                <div>SIM:</div>
                                <div>2 Nano SIM hoặc 1 Nano SIM + 1 eSIMHỗ trợ 5G</div>
                            </div>
                            <div class="parameter-content" style="background-color: #f5f5f5;">
                                <div>Pin, Sạc:</div>
                                <div>3000 mAh45 W</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
    }
}
    ?>
        </div>


        <div class="text">
            <div>Sản phẩm liên quan</div><a href="">Xem tất cả</a>
        </div>
        <nav class="product-two2">
            <?php
            require_once './model/productModel.php';
            $productlq = new ProductModel();
            // Lấy ID sản phẩm từ URL (nếu có)
            $current_product_id = isset($_GET['id']) ? $_GET['id'] : 0; // Nếu không có, mặc định là 0
            $listPro = $productlq->getProductLienquan($current_product_id);
            foreach ($listPro as $item) {
                extract($item);
                echo '
            <div class="product-two-content-items">
                <div class="product-two-content-item">
                    <img src="./public/DuAn_Group-4people/images/' . $hinh_Anh . '" alt="">
                    <div class="product-two-content-item-text">
                        <li class="pricecheap">
                            GIÁ RẺ QUÁ
                        </li>
                        <li>' . $ten_sanPham . ' </li>
                        <li class="pricereal">' . $gia_sanPham . ' <sup>đ</sup><span style="background-color: rgb(255,240,233);">-31%</span></li>
                        <li class="star"> 4.3 <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            (47)</li>
                    </div>
                </div>
            </div>';
            }
            ?>
        </nav>