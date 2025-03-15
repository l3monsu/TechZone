<!-- <link rel="stylesheet" href="./public/DuAn_Group-4people/main.css  ?v = <php echo time(); >?"> -->

<section>
    <div id="big-banner">
        <a href="index.php?page=category&ma_danhMuc=2"><img src="./public/DuAn_Group-4people/images/banner moi.png" alt="" style="width: 80%;margin-left: 151px;margin-top: 30px;"></a>
    </div>
</section>
<!-- -------------product1------------------------- -->
<div class="Sale">
    <h2>Khuyến mãi online</h2>
</div>
<div class="container">
    <!-- hình con -->
    <div class="image-big">
        <div class="image">
            <img src="./public/DuAn_Group-4people/images/anhsaletrangchu.png" alt="" />
        </div>
        <div class="image">
            <img src="./public/DuAn_Group-4people/images/DacquyenTechZone.png" alt="" />
        </div>
        <div class="image">
            <img src="./public/DuAn_Group-4people/images/anhOnly.png" alt="" />
        </div>
        <div class="Text-big">
            <div class="Text">
                <p>Điện thoại</p>
            </div>
            <div class="Text">
                <p>Apple</p>
            </div>
            <div class="Text">
                <p>Laptop</p>
            </div>
            <div class="Text">
                <p>Phụ kiện</p>
            </div>
            <div class="Text">
                <p>Đồng hồ</p>
            </div>
        </div>
    </div>
    <!-- Thời gian còn sale -->
    <div class="time-container">
        <div class="time-text">Chỉ còn:</div>
        <div class="time" id="hours">06</div>
        :
        <div class="time" id="minutes">06</div>
        :
        <div class="time" id="seconds">55</div>
    </div>
    <!-- Phần Product thứ nhất-->
    <div class="product-grid" style="margin-top: 40px;">
        <?php
        require_once './model/productModel.php';
        $product = new ProductModel();
        $listPro = $product->getProduct();

        $count = 0; // Đếm số lượng sản phẩm đã hiển thị
        $visibleLimit = 10; // Số lượng sản phẩm hiển thị ban đầu
        foreach ($listPro as $item) {
            extract($item);
            $class = $count >= $visibleLimit ? 'hidden' : '';
            echo '
                <div class="product-card ' . $class . '">
                    <a href="index.php?page=detail&id=' . $ma_sanPham . '">
                        <img src="./public/DuAn_Group-4people/images/' . $hinh_Anh . '" alt="Product Image">
                    </a>
                    <p class="nameproduct">' . $ten_sanPham . '</p>
                    <p class="price">
                        <span class="old-price">' . number_format($giamGia) . 'đ</span> 
                        <span class="new-price">' . number_format($gia_sanPham) . 'đ</span>
                    </p>
                    <p class="availability">Còn <span>18/20</span> suất</p>
                    
                    <!-- Form gửi dữ liệu -->
                    <form action="index.php?page=add-to-cart" method="POST">
                        <input type="hidden" name="product_id" value="' . $ma_sanPham . '">
                        <input type="hidden" name="product_name" value="' . $ten_sanPham . '">
                        <input type="hidden" name="product_price" value="' . $gia_sanPham . '">
                        <input type="hidden" name="product_image" value="' . $hinh_Anh . '">
                        <input type="hidden" name="quantity" value="1"> <!-- Số lượng mặc định là 1 -->
                        <button type="submit" class="buy-nowhome">Mua ngay</button>
                    </form>
                </div>';
            $count++;
        }
        ?>
        <button id="xemthemspp" class="addproduct">
            Xem thêm sản phẩm
        </button>
    </div>
    <script>
        // JavaScript xem thêm
        const showMoreBtn = document.getElementById('xemthemspp');
        const showLimit = 5;
        showMoreBtn.addEventListener('click', () => {
            const hiddenProducts = document.querySelectorAll('.product-card.hidden');
            let shownCount = 0;

            hiddenProducts.forEach(product => {
                if (shownCount < showLimit) {
                    product.classList.remove('hidden');
                    shownCount++;
                }
            });
            if (document.querySelectorAll('.product-card.hidden').length === 0) {
                showMoreBtn.style.display = 'none';
            }
        });
    </script>
</div>
<aside>
    <div class="shopping-trends">
        <div class="xuhuong">
            <h1>Xu Hướng Mua Sắm</h1>
            <div class="trends-contents">
                <?php
                $HotPro = $product->getHotProduct();
                foreach ($HotPro as $key) {
                    extract($key);
                    echo '
                        <div class="trends-content">
                        
                     <a href="index.php?page=detail&id=' . $ma_sanPham . '"><img src="./public/DuAn_Group-4people/images/' . $hinh_Anh . '" alt=""></a>
                    <ul class="infor-content">
                        <li><strong>' . $ten_sanPham . '</strong></li>
                        <li>Giá Chỉ Từ ' .  number_format($gia_sanPham) . 'đ</li>
                    </ul>
                </div>
                        ';
                }
                ?>

            </div>
        </div>
    </div>
</aside>
<nav class="khuyenmai">
    <h3 style="padding:30px 0px;">KHUYẾN MÃI CHỈ CÓ TRÊN ONLINE</h3>
    <img src="./public/DuAn_Group-4people/images/khuyenmai1.png" alt="">
</nav>

<!-- -------------danhmuc------------------------- -->
<nav class="noibat">
    <div class="thechua">
        <div class="danhmuc">
            <h1>Danh mục nổi bật</h1>
            <div class="toppics">
                <?php
                require_once './model/categoryModel.php';
                $category = new categoryModel();
                $listcate = $category->getdanhmuchead();
                foreach ($listcate as $cate) {
                    extract($cate);
                    echo '
                    <div class="toppic">
                        <a  href="index.php?page=category&ma_danhMuc=' . $ma_danhMuc . '">
                            <img src="./public/DuAn_Group-4people/images/' . $hinhanh . '" alt="">
                            <li>' . $ten_danhMuc . '</li>
                        </a>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- --------------------dvtienich------------------------- -->
</nav>
<nav class="dvtienich">
    <div class="thechua2">
        <h1>Gợi Ý Hôm Nay</h1>
    </div>
    <div class="thes">
        <div class="the">
            <img src="./public/DuAn_Group-4people/images/g1.webp" alt="">
            <li>Cho Bạn</li>
        </div>
        <div class="the">
            <img src="./public/DuAn_Group-4people/images/g2.webp" alt="">
            <li>Laptop Gaming</li>
        </div>
        <div class="the">
            <img src="./public/DuAn_Group-4people/images/g3.webp" alt="">
            <li>Phụ Kiện Giảm Sốc</li>
        </div>
        <div class="the">
            <img src="./public/DuAn_Group-4people/images/g4.webp" alt="">
            <li>Tablet Giá Rẻ</li>
        </div>
    </div>
</nav>
<!-- ------------------Phần Product kecuoi----------------------- -->
<nav class="product-two">
    <?php
    require_once './model/productModel.php';
    $productend = new ProductModel();
    $listend = $productend->getProductNew();
    $count = 0; // Đếm số lượng sản phẩm đã hiển thị
    $visibleLimit = 10; // Số lượng sản phẩm hiển thị ban đầu
    foreach ($listend as $proend) {
        extract($proend);
        $class = ($count >= $visibleLimit) ? ' hidden' : '';
        echo '
        <div class="product-two-content-item' . $class . '">
            <a href="index.php?page=detail&id=' . $ma_sanPham . '"><img src="./public/DuAn_Group-4people/images/' . $hinh_Anh . '" alt=""></a>
            <div class="product-two-content-item-text">
                <li class="pricecheap">
                    GIÁ RẺ QUÁ
                </li>
                <li>' . $ten_sanPham . '<br>
                     </li>
                <li class="pricereal">' . number_format($gia_sanPham) . ' <sup>đ</sup><span style="background-color: rgb(255,240,233);">-41%</span></li>
                <li class="star"> 4.5 <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    (104)</li>
            </div>
        </div>';
        $count++;
        
    }
    ?>
    <button id="xemthemsp2" class="xemm">
        Xem thêm sản phẩm
    </button>
</nav>
<script>
    // JavaScript xem thêm
    const showMoreBtn2 = document.getElementById('xemthemsp2');
    const showLimit2 = 5;
    showMoreBtn2.addEventListener('click', () => {
        const hiddenProducts = document.querySelectorAll('.product-two-content-item.hidden');
        let shownCount = 0;
        hiddenProducts.forEach(product => {
            if (shownCount < showLimit2) {
                product.classList.remove('hidden');
                shownCount++;
            }
        });
        if (document.querySelectorAll('.product-two-content-item.hidden').length === 0) {
            showMoreBtn2.style.display = 'none';
        }
    });
</script>

<!-- -----------------------product two 2.3----------------------------->
<!-- ------------------timkiemnhieu-------------------- -->
<nav class="timkiem">
    <div class="timkiemnhieu">
        <h1>Tìm Kiếm Nhiều</h1>
        <div class="danhsach">
            <li>iphone 15</li>
            <li>pin bàn phím máy tính</li>
            <li>loa jbl</li>
            <li>laptop hp</li>
            <li>airtag</li>
            <li>tai nghe sony</li>
            <li>lg gram</li>
            <li>đồng hồ lacoste</li>
            <li>laptop đồ họa</li>
            <li>phụ kiện samsung</li>
            <li>đồng hồ quartz</li>
            <li>đồng hồ skagen</li>
            <li>đồng hồ thông minh chống nước</li>
            <li>macbook</li>
            <li>màn hình máy tính</li>
            <li>máy chiếu</li>
            <li>loa sony</li>
            <li>loa kéo asus rog</li>
            <li>orient star</li>
            <li>máy in brother</li>
            <li>khoá cửa điện tử</li>
            <li>loa nanomax</li>
            <li>đồng hồ mặt vuông</li>
            <li>màn hình asus</li>
            <li>mac air</li>
            <li>điện thoại oppo a98</li>
            <li>iphone 15 128gb</li>
            <li>iphone 15 mini</li>
            <li>iphone 15 plus</li>
            <li>iphone 15 pro</li>
            <li>iphone 15 pro max</li>
            <li>iphone 15 ultra</li>
            <li>garmin forerunner</li>
            <li>đồng hồ mạ vàng</li>
            <li>apple watch 8</li>
        </div>
    </div>
</nav>
<script>
    // Khởi tạo thời gian ban đầu (giờ, phút, giây)
    let hours = 6;
    let minutes = 6;
    let seconds = 55;

    // Hàm cập nhật đồng hồ đếm ngược
    function updateTimer() {
        // Giảm số giây
        seconds--;

        // Xử lý nếu giây < 0
        if (seconds < 0) {
            seconds = 59;
            minutes--;
        }

        // Xử lý nếu phút < 0
        if (minutes < 0) {
            minutes = 59;
            hours--;
        }

        // Dừng đếm nếu giờ, phút, giây đều = 0
        if (hours === 0 && minutes === 0 && seconds === 0) {
            clearInterval(timerInterval);
        }
        // Cập nhật nội dung hiển thị
        document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
        document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
    }
    const timerInterval = setInterval(updateTimer, 1000);
</script>