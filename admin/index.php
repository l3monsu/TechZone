<?php
$baseUrl = "http://localhost/Project1_Group-TechZone/admin";
if (isset($_GET['mod'])) {
switch($_GET['mod']){
    case'order' : 
        include_once 'controller/c_pageOrder.php';
        break;
    case 'user' :
        include_once 'controller/c_user.php';
        break;
    case 'chart' :
        include_once 'controller/c_chart.php';
        break;
    case 'cate' :
        include_once 'controller/c_cate.php';
        break;
    case 'detailCate' :
        include_once 'controller/c_detailCate.php';
        break;
    case 'blog' :
        include_once 'controller/c_blog.php';
        break;
    case 'product':
        include_once 'controller/product.php';
        break;
    case 'page':
        
        include_once 'controller/c_home.php';
        break;
    default :
        include_once 'controller/c_user.php';
        break;
    }
}else{
    header("Location:?mod=page&act=home");
}

