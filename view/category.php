<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>TechZone</title>
    <link rel="stylesheet" href="./public/DuAn_Group-4people/CSS/danhmuccc.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body style="background-color: rgb(241, 241, 241);">
    <div class="khung"></div>
    <div class="banner">
        <div class="slides">
            <img src="./public/DuAn_Group-4people/images/bannerlt1.png" alt="">
            <img src="./public/DuAn_Group-4people/images/bannertl2.jpg" alt="">
            <img src="./public/DuAn_Group-4people/images/bannerdt3.png" alt="">
            <img src="./public/DuAn_Group-4people/images/865a4260561e2da67afa93473fb0b4b3.jpg" alt="">
        </div>
        <button class="prev" onclick="changeSlide(-1)">❮</button>
        <button class="next" onclick="changeSlide(1)">❯</button>
    </div>

    <div class="khung"></div>
    <nav>
        <div class="slidesp">
            <div class="loaisp">
                <div class="loaispphone1">
                    <a href=""><img style="height: 35px;" src="./public/DuAn_Group-4people/images/alll.png" alt=""></a>
                </div>
                <?php
                require_once './model/categoryModel.php';
                $category = new categoryModel();
                // Kiểm tra xem có danh mục không
                if (isset($_GET['ma_danhMuc']) && !empty($_GET['ma_danhMuc'])) {
                    $ma_danhMuc = $_GET['ma_danhMuc'];
                    // Lấy danh sách thương hiệu theo danh mục
                    $brands = $category->getBrandByCategory($ma_danhMuc);
                    // Hiển thị danh sách thương hiệu
                    foreach ($brands as $brand) {
                        echo '
                            <div class="loaispphone">
                                <a href="index.php?page=category&ma_danhMuc=' . $ma_danhMuc . '&ma_thuongHieu=' . $brand['ma_thuongHieu'] . '">
                                    <img src="./public/DuAn_Group-4people/images/' . $brand['logo_thuongHieu'] . '" alt="">
                                </a>
                            </div>';
                    }
                }
                ?>

            </div>
            <div class="mucsp">
                <p>Sắp xếp theo:</p>
                <a href="index.php?page=category&ma_danhMuc=<?= $_GET['ma_danhMuc'] ?>&sort=moi">
                    <p>Mới</p>
                </a>
                <p>*</p>
                <a href="index.php?page=category&ma_danhMuc=<?= $_GET['ma_danhMuc'] ?>&sort=banchay">
                    <p>Bán chạy</p>
                </a>
                <p>*</p>
                <a href="index.php?page=category&ma_danhMuc=<?= $_GET['ma_danhMuc'] ?>&sort=giamgia">
                    <p>Giảm giá</p>
                </a>
                <p>*</p>
            </div>
        </div>
        <div class="slidesp1">
            <?php
            require_once './model/productModel.php';
            $product = new ProductModel();
            // $listPro = $product->getProductCate($_GET['ma_danhMuc']);
            $listPro = [];
            if (isset($_GET['ma_thuongHieu']) && !empty($_GET['ma_thuongHieu'])) {
                $listPro = $product->getProductBrand($_GET['ma_thuongHieu']);
            } elseif (isset($_GET['ma_danhMuc']) && !empty($_GET['ma_danhMuc'])) {
                $ma_danhMuc = $_GET['ma_danhMuc'];
                $sort = isset($_GET['sort']) ? $_GET['sort'] : 'moi';

                // Điều chỉnh query SQL dựa vào tham số sắp xếp
                switch ($sort) {
                    case 'banchay':
                        $listPro = $product->getProductCateOrder($ma_danhMuc, 'soLuong DESC');
                        break;
                    case 'giamgia':
                        $listPro = $product->getProductCateOrder($ma_danhMuc, 'giamGia DESC');
                        break;
                    case 'moi':
                    default:
                        $listPro = $product->getProductCateOrder($ma_danhMuc, 'ma_sanPham DESC'); // mặc định là sản phẩm mới nhất
                        break;
                }
            } else {
                echo "<p>Không tìm thấy sản phẩm phù hợp.</p>";
            }
            // ----
            $count = 0; // Đếm số lượng sản phẩm đã hiển thị
            $visibleLimit = 10; // Số lượng sản phẩm hiển thị ban đầu
            //-----
            foreach ($listPro as $item) {
                extract($item);

                // Thêm class hidden cho các sản phẩm vượt quá giới hạn hiển thị ban đầu
                $class = $count >= $visibleLimit ? 'hidden' : '';
                echo '
                    <div class="spslide ' . $class . '">
                        <div class="tragop">Trả góp 0%</div>
                        <div class="hinhspl">
                            <a href="index.php?page=detail&id=' . $ma_sanPham . '">
                                <img class="hinhspm" src="./public/DuAn_Group-4people/images/' . $hinh_Anh . '" alt="Product Image">
                            </a>
                        </div>
                        <div class="motasp">
                            <h3><a style="text-decoration:none;" href="index.php?page=detail&id=' . $ma_sanPham . '">' . $ten_sanPham . '</a></h3>
                            <div class="ô">
                                <div class="oo">Super Cheap</div>
                                <div class="oo">10"</div>
                            </div>
                            <div style="height:5px;"></div>
                            <del>' . number_format($giamGia) . '</del><p>' . number_format($gia_sanPham) . ' đ</p>
                            <img class="star" src="./public/DuAn_Group-4people/images/star.png" alt=""> 5(10)
                        </div>
                        <div class="sl">sl:' . number_format($soLuong) . '</div>
                    </div>';
                $count++;
            }
            ?>
            <div class="slidesp1"></div>

            <button id="xemthemsp" class="xemthemsp">Xem thêm</button>
            <div class="slidesp">
                <div class="hoikh">
                    <div class="hkh">
                        <p class="hvd">Bạn có hài lòng với trải nghiệm tìm kiếm <br> thông tin, sản phẩm trên website không?</p>
                        <div class="td">
                            <div class="tđ">
                                <span class="emoji">😊</span>
                                <span class="tl">Hài lòng</span>
                            </div>
                            <div class="tđ">
                                <span class="emoji">😞</span>
                                <span class="tl">Không <br> hài lòng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // JavaScript xem thêm
            const showMoreBtn = document.getElementById('xemthemsp');
            const showLimit = 10; // Số lượng sản phẩm hiển thị thêm mỗi lần bấm

            showMoreBtn.addEventListener('click', () => {
                // Lấy danh sách các sản phẩm ẩn
                const hiddenProducts = document.querySelectorAll('.spslide.hidden');
                let shownCount = 0; // Đếm số sản phẩm đã hiển thị thêm

                hiddenProducts.forEach(product => {
                    if (shownCount < showLimit) {
                        product.classList.remove('hidden');
                        shownCount++;
                    }
                });

                // Kiểm tra xem còn sản phẩm ẩn không
                if (document.querySelectorAll('.spslide.hidden').length === 0) {
                    showMoreBtn.style.display = 'none'; // Ẩn nút nếu không còn sản phẩm
                }
            });
        </script>

        <script>
            // JavaScript chuyển hình
            let currentIndex = 0; // Vị trí slide hiện tại
            const slides = document.querySelectorAll('.slides img'); // Lấy tất cả hình trong slide
            const totalSlides = slides.length;
            function showSlide(index) {
                // Đảm bảo chỉ số không vượt quá giới hạn
                if (index >= totalSlides) currentIndex = 0;
                else if (index < 0) currentIndex = totalSlides - 1;
                else currentIndex = index;
                // Di chuyển slide
                document.querySelector('.slides').style.transform = `translateX(-${currentIndex * 50}%)`;
            }
            function changeSlide(step) {
                showSlide(currentIndex + step);
            }
            // Tự động chuyển slide mỗi 3 giây
            setInterval(() => changeSlide(1), 3000);
        </script>

    </nav>
</body>



<!-- <div class="slidesp1">
            <?php
            require_once './model/productModel.php';
            if (isset($_GET['idCate'])) {
                $idcate = $_GET['idCate'];
                $product = new ProductModel();
                $listPro = $product->getProductCate($idcate);
                if ($idcate == $listPro['ma_danhMuc']) {
            ?>
                    <div class="spslide">
                        <div class="tragop">Trả góp 0%</div>
                        <div class="hinhspl">
                            <a href="index.php?page=detail&id=<?= $procate['ma_sanPham']; ?>">
                                <img class="hinhspm" src="./public/DuAn_Group-4people/images/<?= $procate['hinh_Anh']; ?>" alt="Product Image">
                            </a>
                        </div>
                        <div class="motasp">
                            <h3><a style="text-decoration:none;" href="index.php?page=detail&id=<?= $procate['ma_sanPham']; ?>"><?= $listcate['ten_sanPham']; ?></a></h3>
                            <div class="ô">
                                <div class="oo">Super Retina XDR</div>
                                <div class="oo">6.9"</div>
                            </div>
                            <p><?= $listcate['gia_sanPham']; ?> đ</p>
                            <img class="star" src="./public/DuAn_Group-4people/images/star.png" alt=""> 5(10)
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <button class="xemthemsp">Xem thêm</button>
            <script>
                // JavaScript
                const showMoreBtn = document.getElementById('xemthemsp');
                const hiddenProducts = document.querySelectorAll('.spslide');

                showMoreBtn.addEventListener('click', () => {
                    hiddenProducts.forEach(product => {
                        product.classList.remove('hidden');
                    });
                    showMoreBtn.style.display = 'none'; // Ẩn nút sau khi hiển thị
                });
            </script>
        </div> -->