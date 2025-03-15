<?php
include_once '../model/m_blog.php';
$c_Blog = new m_Blog();
if(isset($_GET['act'])) {
switch ($_GET['act']) {
    case 'blog':
        include_once 'view/layout/header.php';
        include_once 'view/page_blog.php';
        include_once 'view/layout/footer.php';
        break;
        case 'addBlog':
            include_once 'view/layout/header.php';
            include_once 'view/page_addBlog.php';
            include_once 'view/layout/footer.php';
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $tieuDe = $_POST['tieuDe'];
                $moTa = $_POST['moTa'];
                $trangThai = $_POST['trangThai'];
            
                $hinhAnh = null;
                if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] === UPLOAD_ERR_OK) {
                    $hinhAnh = 'upload/blog/' . $_FILES['hinhAnh']['name'];
                    move_uploaded_file($_FILES['hinhAnh']['tmp_name'], $hinhAnh);
                }
            
                $c_Blog->addBlog($tieuDe, null, $moTa, $trangThai, $hinhAnh);
            }
            break;
        
    case 'deleteBlog':
        if (isset($_GET['ma_baiViet'])) {
            $ma_baiViet = $_GET['ma_baiViet'];
        $c_Blog->deleteBlog($ma_baiViet);
        header("Location: ?mod=blog&act=blog");
        }
        break;
        case 'updateBlog':
            if (isset($_GET['ma_baiViet'])) {
                $ma_baiViet = $_GET['ma_baiViet'];
                $blog = $c_Blog->getBlogById($ma_baiViet);
            }else {
                $blog = null;
            }
        
            include_once 'view/layout/header.php';
            include_once 'view/page_updateBlog.php';
            include_once 'view/layout/footer.php';
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $tieuDe = $_POST['tieuDe'];
                $moTa = $_POST['moTa'];
                $trangThai = $_POST['trangThai'];
            
                if (in_array($trangThai, ['Hoạt Động', 'Không Hoạt Động'])) {
                    $trangThai = ($_POST['trangThai'] === 'Hoạt Động') ? 1 : 0;
                    $c_Blog->updateBlog($tieuDe, $moTa, $trangThai, $_POST['ma_baiViet']);

                } else {
                    echo "Trạng thái không hợp lệ.";
                }
            }
            break;
    default:
        break;
}
}else{
    header("Location: ?mod=page&act=home");
}