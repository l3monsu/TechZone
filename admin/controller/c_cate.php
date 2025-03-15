<?php
require_once '../../Project1_Group-TechZone/model/m_base.php';
require_once '../../Project1_Group-TechZone/model/m_cate.php';
$c_Category = new m_Category();

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'cate':
            include_once "view/layout/header.php";
            include_once "../admin/view/page_cate.php";
            include_once "view/layout/footer.php";
            break;

        case 'addCate':
            include_once "view/layout/header.php";
            include_once "../admin/view/page_addCate.php";
            include_once "view/layout/footer.php";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $ten_danhMuc = $_POST['ten_danhMuc'];
                    $soLuong = $_POST['soLuong'];
                    $c_Category->addCategory($ten_danhMuc, $soLuong);
                break;
                }
        case 'deleteCate':
            if (isset($_GET['ma_danhMuc'])) {
                $ma_danhMuc = $_GET['ma_danhMuc'];
            $c_Category->deleteCategory($ma_danhMuc);
            header("Location: ?mod=cate&act=cate");
            }
            break;
        // case 'searchCate':
        //     $searchResults = [];
        //     $search = $_GET['search'] ?? '';
        //     $column = $_GET['column'] ?? 'ten_danhMuc';
        //     $categories = $model->searchCategory($search, $column);          
        //     include_once "./admin/view/page_cate.php";
        //     break;
        default:
            break;
    }
} else {
    header("Location: ?mod=page&act=home");
}
