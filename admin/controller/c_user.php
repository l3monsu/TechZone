<?php
if(isset($_GET['act'])) {
switch ($_GET['act']) {
    case 'user': //?mod=user&act=
        //Xử Lý
        include_once "../../Project1_Group-TechZone/model/user.php";
        include_once "../../Project1_Group-TechZone/model/pdo.php";
        $user=user_getAll();
        if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action'])) {
            $id = $_GET['id'];
            $action = $_GET['action'];
            $user = get_userById($id);
        
            if ($user) {
                if ($action == 'status') {
                    // Đổi trạng thái
                    $newStatus = $user['trang_Thai'] == 0 ? 1 : 0;
                    updateUserStatus($id, $newStatus);
                } elseif ($action == 'role') {
                    // Đổi vai trò
                    $newRole = $user['vaiTro'] == 1 ? 0 : 1;
                    updateUserStatusRole($id, $newRole);
                }
                header("Location: ?mod=user&act=user");
                exit();
            }
        }
        
        
        
        //Hiển thị
        include_once  "view/layout/header.php";
        include_once  "view/page_user.php";
        include_once  "view/layout/footer.php";
        break;
        
    case 'edit': //?mod=user&act=
        include_once "../../Project1_Group-TechZone/model/pdo.php";
        include_once "../../Project1_Group-TechZone/model/user.php";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['user'] = get_userById($_GET['id']); // Lấy thông tin người dùng để hiển thị trong form
        }

        if (isset($_POST['submit-edit'])) {
            print_r([
                'id'=>$_GET['id'],
            'ten_nguoiDung'=>$_POST['ten_nguoiDung'],
            'email_nguoiDung'=>$_POST['email_nguoiDung'],
            'sDt_nguoiDung'=>$_POST['sDt_nguoiDung'],
            'vaiTro'=>$_POST['vaiTro'],]);
            $kq = edit_user(
                $_GET['id'],
                $_POST['ten_nguoiDung'],
                $_POST['matKhau_nguoiDung'],
                $_POST['email_nguoiDung'],
                $_POST['sDt_nguoiDung'],
                $_POST['vaiTro'],
                $_POST['trang_Thai']);
            if ($kq) {
                echo "Cập nhật thành công!";
                header("Location:?mod=user&act=user");
            } else {
                echo "Cập nhật thất bại!";
            }
        }



        include_once  "view/layout/header.php";
        include_once  "view/editUser.php";
        include_once  "view/layout/footer.php";
            break;
        case 'delete': //?mod=user&act=
        //Xử Lý
        if(isset($_GET['id'])){
            $kq=user_hide($_GET['id']);
            if($kq){
                $thongbao="Đã ẩn khách hàng [".$_GET['id']."]thành công";
                header("Location:?mod=user&act=user");
            }else{
                $thongbao="Đã có lỗi không mông muốn";
            };
        }
        //Hiển thị
        include_once  "view/layout/header.php";
        include_once  "view/page_user.php";
        include_once  "view/layout/footer.php";
        break;
        case'search':
                include_once "../../Project1_Group-TechZone/model/pdo.php";
                include_once "../../Project1_Group-TechZone/model/user.php";
            
                if(isset($_GET['keyword'])){
                    $user= search_user($_GET['keyword']);
                }
                include_once "view/layout/header.php";
                include_once "view/user_seach.php";
                include_once "view/layout/footer.php";
                break;
        default:

        break;
    }
}