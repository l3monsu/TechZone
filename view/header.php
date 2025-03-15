<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>TechZone</title>
    <link rel="stylesheet" href="./public/DuAn_Group-4people/mainnn.css">
</head>

<body>
    <div id="header-sum">
        <div class="header-child1">
            <a href="index.php"><img src="./public/DuAn_Group-4people/images/techzonexn.png" alt="" height="40px" width="228px" style="object-fit:  cover;"></a>
            <form action="index.php" method="GET">
                <button type="submit" class="search-box">
                    <input type="hidden" name="page" value="search">
                    <i class="bi bi-search"></i><input type="text" name="query" placeholder="Bạn tìm gì..." required>
                </button>
            </form>
            <div class="login">
                
                <?php
                if (isset($_SESSION['Ten_nguoiDung'])) {
                    echo '
                <ul class="menu_dangnhap">
                    <li class="dropdown-toggle">
                    <i class="bi bi-person"></i>
                 ' . $_SESSION['Ten_nguoiDung'] . '
                    <ul class="dropdown-menu">
                    <li><a href="index.php?page=user-profile">Xem thông tin</a></li>
                    <li><a href="index.php?page=donhang">Đơn hàng</a></li>
                    <li><a href="index.php?page=logout">Đăng xuất</a></li>
                    </ul>
                    </li>
                   </ul>';
                } else {
                    echo '
        <a href="index.php?page=login" class="login-link">
            <i class="bi bi-person"></i>
            Đăng nhập
        </a>';
                }
                ?>
            </div>

            <div class="card-now">
                <a href="index.php?page=cart">
                    <i class="bi bi-cart2"></i>
                    Giỏ Hàng
                </a>
            </div>
            <div class="card-now"><a href="index.php?page=post"><i class="bi bi-file-spreadsheet-fill"></i>Bài viết</a></div>
            <button class="location">
                <div class="location-child">
                    <i class="bi bi-geo-alt"></i>
                    Hồ Chí Minh
                </div>
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>
    <div class="sum-header">
        <div class="header-child2">
            <ul>
                <?php
                require_once '../Project1_Group-TechZone/model/categoryModel.php';
                $category = new categoryModel();
                $listcate = $category->getdanhmuchead();
                foreach ($listcate as $cate) {
                    extract($cate);
                    echo '
                    <li>
                        <a href="index.php?page=category&ma_danhMuc=' . $ma_danhMuc . '">
                            <div>' . $ten_danhMuc . '</div>
                        </a>
                    </li>
                ';
                }
                ?>
                
            </ul>
        </div>
    </div>






    <!-- <ul>
                <li><a href="index.php?page=category"><i class="bi bi-phone" style="margin-right: 6px;"></i>Điện Thoại</a></li>
                <li><a href=""><i class="bi bi-laptop" style="margin-right: 6px;"></i>Laptop</a></li>
                <li><a href=""></a><i class="bi bi-file-spreadsheet-fill" style="margin-right: 6px;"></i>Tablet</li>
                <li class="dropdown"><a href=""></a>
                    <i class="bi bi-headset" style="margin-right: 6px;">
                    </i>Phụ Kiện<i style="margin-left:5px;" class="bi bi-caret-down-fill"></i>
                    <div class="dropdown-content">
                        <div class="menutong">
                            <div class="submenu">
                                <ul>
                                    <strong style="margin-left: 6px; border-bottom: 2px solid rgb(237, 235, 235);">Phụ
                                        Kiện
                                        Di
                                        Động</strong>
                                    <li><a href="">Sạc dự phòng</a></li>
                                    <li><a href="">Sạc,cáp</a></li>
                                    <li><a href="https://www.thegioididong.com/op-lung-flipcover">Ốp lưng điện thoại</a>
                                    </li>
                                    <li><a href="">Ốp lưng máy tính bảng</a></li>
                                    <li><a href="">Miến dáng màn hình</a></li>
                                    <li><a href="">Gậy chụp ảnh,Gimbal</a></li>
                                    <li><a href="">Giá đỡ điện thoại</a></li>
                                    <li><a href="">Đế móc điện thoại</a></li>

                                </ul>
                            </div>
                            <div class="submenu2">
                                <ul>
                                    <strong style="border-bottom: 2px solid rgb(242, 242, 242);">Phụ Kiện
                                        Laptop</strong>
                                    <li><a href="">Chuột bàn phím</a></li>
                                    <li><a href="">Thiết bị mạng</a></li>
                                    <li><a href="">Balo,túi chống sốc</a></li>
                                    <li><a href="">Phần mềm</a></li>
                                    <strong style="border-bottom: 2px solid rgb(244, 240, 240);">Thiết Bị Âm
                                        Thanh</strong>
                                    <li><a href="">Tai Nghe</a></li>
                                    <li><a href="">Loa</a></li>
                                    <li><a href="">Micro</a></li>
                                </ul>
                            </div>
                            <div class="submenu3">
                                <ul>
                                    <strong style="border-bottom: 2px solid rgb(242, 242, 242);">Thiết Bị Nhà Thông
                                        Minh</strong>
                                    <li><a href="">Khóa điện tử</a></li>
                                    <li><a href="">Camera, webcam</a></li>
                                    <li><a href="">Máy chiếu</a></li>
                                    <li><a href="">TV Box</a></li>
                                    <li><a href="">Ổ cắm bóng đèn</a></li>
                                    <strong style="border-bottom: 2px solid rgb(244, 240, 240);">Thiết Bị Lưu
                                        Trữ</strong>
                                    <li><a href="">Ổ cứng</a></li>
                                    <li><a href="">Thẻ nhớ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href=""></a><i class="bi bi-smartwatch" style="margin-right: 6px;"></i>Smartwatch</li>
                <li><a href=""></a><i class="bi bi-alarm" style="margin-right: 6px;"></i>Đồng Hồ</li>
                <li><a href=""></a><i class="bi bi-phone-flip" style="margin-right: 6px;"></i>Máy cũ giá rẻ</li>
                <li class="dropdown1"><a href=""></a>
                    <i class="bi bi-pc-display" style="margin-right: 6px;"></i>PC,Máy in
                    <i style="margin-left:5px;" class="bi bi-caret-down-fill"></i>
                    <div class="dropdown-content1">
                        <ul>
                            <li><a href="">Máy In</a></li>
                            <li><a href="">Mực In</a></li>
                            <li><a href="">Máy Tính Để Bàn</a></li>
                            <li><a href="">Màn Hình Máy Tính</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="">Sim,Thẻ cào</a></li>
                <li class="dropdown2"><a href="index.php?page=post">Bài viết <i style="margin-left:6px;"></i></a>
                </li>
    </ul> -->