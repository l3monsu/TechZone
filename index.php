<?php
ob_start();

?>
<?php
require_once '../Project1_Group-TechZone/view/header.php';
require_once '../Project1_Group-TechZone/controller/homeController.php';
require_once '../Project1_Group-TechZone/controller/userController.php';
require_once '../Project1_Group-TechZone/controller/cartController.php';
require_once '../Project1_Group-TechZone/controller/orderController.php';
require_once '../Project1_Group-TechZone/controller/searchController.php';
require_once '../Project1_Group-TechZone/controller/donHangController.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'login':
            require_once '../Project1_Group-TechZone/view/login.php';
            break;

        case 'cart':
            $cartController = new CartController();
            $cartController->viewCart();
            break;

        case 'add-to-cart':
            $cartController = new CartController();
            $cartController->addToCart();
            break;

        case 'update-cart':
            $cartController = new CartController();
            $cartController->updateCart();
            break;

        case 'checkout':
            $cartController = new CartController();
            $cartController->checkout();
            break;

        case 'logout':
            // Đăng xuất và hủy session
            session_destroy();
            $_SESSION = [];
            echo '<script>location.href="index.php?page=main"</script>';
            exit();
            break;

        case 'register':
            require_once '../Project1_Group-TechZone/view/register.php';
            break;

        case 'signup':
            $signup = new userController();
            $signup->signup();
            break;

        case 'post':
            require_once '../Project1_Group-TechZone/view/post.php';
            break;

        case 'category':
            require_once '../Project1_Group-TechZone/view/category.php';
            break;

        case 'detail':
            require_once '../Project1_Group-TechZone/view/detail.php';
            break;
        case 'order':
            $orderController = new OrderController();
            $orderController->placeOrder();
            require_once '../Project1_Group-TechZone/view/order.php';
            break;
        case 'search':
            $searchController = new SearchController();
            $searchController->search();
            // require_once './view/search.php';
            break;

        case 'user-profile':
            $userController = new userController();
            $userController->userProfile();
            break;
        case 'donhang':
            if (isset($_GET['action']) && $_GET['action'] == 'huy' && isset($_GET['ma_donHang'])) {
                $ma_donHang = $_GET['ma_donHang'];
                $DonHangController = new DonHangController();
                $DonHangController->huyDonHang($ma_donHang);
            } else {
                $DonHangController = new DonHangController();
                $ma_nguoiDung = isset($_SESSION['ma_nguoiDung']) ? $_SESSION['ma_nguoiDung'] : null;
                $DonHangController->hienThiDonHang($ma_nguoiDung);
            }
            break;
        default:
            // Trang chủ mặc định
            $home = new HomeController();
            $home->viewHome();
            break;
    }
} else {
    // Trang chủ khi không có `page`
    $home = new HomeController();
    $home->viewHome();
}
require_once '../Project1_Group-TechZone/view/footer.php';
