<?php
class CartController
{
    // Hiển thị giỏ hàng
    public function viewCart()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        require_once './view/cart.php';
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Lấy ID sản phẩm từ POST
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];
    
        // Kết nối cơ sở dữ liệu
        require_once './model/pdo.php'; 
        $db = new Database(); 
        $conn = $db->conn;
    
        // Truy vấn để lấy thông tin sản phẩm 
        $stmt = $conn->prepare("SELECT * FROM sanpham WHERE ma_sanPham = :id");
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($product) {
            // Kiểm tra nếu giỏ hàng chưa tồn tại
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
    
            if (isset($_SESSION['cart'][$productId])) {
                // Nếu sản phẩm đã tồn tại, tăng số lượng
                $_SESSION['cart'][$productId]['quantity'] += $quantity;
            } else {
                // Nếu sản phẩm chưa có trong giỏ, thêm mới
                $_SESSION['cart'][$productId] = [
                    'name' => $product['ten_sanPham'],
                    'price' => $product['gia_sanPham'],
                    'image' => $product['hinh_Anh'],
                    'sale' => $product['giamGia'],
                    'color' => $product['mauSac'],
                    'quantity' => $quantity,
                ];
            }
        } else {
            echo '<script>alert("Sản phẩm không tồn tại.");</script>';
        }
    
        // Điều hướng về giỏ hàng
        header('Location: index.php?page=cart');
        exit();
    }

    // Cập nhật giỏ hàng
    public function updateCart()
    {
        session_start();

        $productId = $_POST['product_id'];
        $action = $_POST['action'];

        if (isset($_SESSION['cart'][$productId])) {
            if ($action === 'increase') {
                $_SESSION['cart'][$productId]['quantity']++;
            } elseif ($action === 'decrease') {
                $_SESSION['cart'][$productId]['quantity']--;
                if ($_SESSION['cart'][$productId]['quantity'] <= 0) {
                    unset($_SESSION['cart'][$productId]);
                }
            } elseif ($action === 'delete') {
                unset($_SESSION['cart'][$productId]);
            }
        }

        // Điều hướng về giỏ hàng
        header('Location: index.php?page=cart');
        exit();
    }

    // Hiển thị trang thanh toán
    public function checkout()
    {
        session_start();
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            require_once './view/checkout.php';
        } else {
            echo '<p>Giỏ hàng của bạn đang trống.</p>';
        }
    }
}
