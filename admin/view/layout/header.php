<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$baseUrl?>/asset/css/style.css">
    <link rel="stylesheet" href="<?=$baseUrl?>//asset/css/product.css">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Admin TechZone</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
            </div>
            <a href="<?=$baseUrl?>/?mod=page&act=home" style="text-decoration:none">
            <span class="logo_name">TechZone</span>
            </a>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="<?=$baseUrl?>/?mod=order&act=order">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Quản lý đơn hàng</span>
                </a></li>
                <li><a href="<?=$baseUrl?>/?mod=user&act=user">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Quản lý khách hàng</span>
                </a></li>
                <li><a href="<?=$baseUrl?>/?mod=page&act=home">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Báo cáo thống kê</span>
                </a></li>
                <li><a href="<?=$baseUrl?>/?mod=cate&act=cate">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Quản lý danh mục</span>
                </a></li>
                <li><a href="<?=$baseUrl?>/?mod=product&act=admin_product">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Quản lý sản phẩm</span>
                </a></li>
                <li><a href="<?=$baseUrl?>/?mod=blog&act=blog">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Quản lý bài viết</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="http://localhost/Project1_Group-TechZone/index.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <form method="GET" action="?mod=cate&act=search"> -->
            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" name="keyword" placeholder="Search here..."value=<?=$_GET['keyword'] ?? ''?>>  
                <button type="submit" class="search-btn">Search</button> -->
            </div>
        </div>
        <!-- </form> -->
    <div class="welcome-message" id="welcomeMessage">
    <h1>Xin chào, chào mừng đến với TechZone!</h1>
</div>
