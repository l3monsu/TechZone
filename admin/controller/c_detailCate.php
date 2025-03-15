<?php
require_once '../../Project1_Group-TechZone/model/m_cate.php';

if(isset($_GET['act'])) {
switch ($_GET['act']) {
    case 'detailCate':
        include_once "view/layout/header.php";
        include_once "view/layout/footer.php";
        break;
    default:
        # code...
        break;
}
}else{
    header("Location: ?mod=page&act=home");
}
$categoryModel = new m_Category();   
$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
if ($category_id) {
    $products = $categoryModel->getProductsByCategory($category_id);
    require_once '../../Project1_Group-TechZone/admin/view/page_detailCate.php';
} else {
    echo "Danh mục không tồn tại!";
}