<?php
    require_once '../../Project1_Group-TechZone/model/pdo.php';

if(isset($_GET['act'])) {
switch ($_GET['act']) {
    case 'home':
        include_once "view/layout/header.php";
        include_once "view/page_home.php";
        include_once "view/layout/footer.php";
        break;
    case 'admin_product':
        require_once '../../Project1_Group-TechZone/model/pdo.php';
        require_once '../../Project1_Group-TechZone/model/products.php';
         $data['dssp'] = get_products(0,0,10);
         $page = 1;
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
        
        $soluongsp = count_product()['soLuong'];
        $sotrang=ceil($soluongsp/10);  
        $start= ($page -1)*10;
        $limit=10;
        
        if($page == $sotrang){
            $offset=$sotrang-$limit;
        };
        $data['dssp']= get_products(0,$start,$limit);

        include_once "view/layout/header.php";
        include_once "view/product_admin.php";
        include_once "view/layout/footer.php";
        
        break;
    case 'add':
                    require_once '../../Project1_Group-TechZone/model/pdo.php';
                    require_once '../../Project1_Group-TechZone/model/products.php';
            $data['dsdm']=get_danhmuc();
            $data['dstH']=get_thuongHieu();
            if(isset($_POST['submit-add'])){
                $kq=add_product(
                    $_POST['ten_sanPham']
                    ,$_FILES['hinh_Anh']['name']  
                    ,$_POST['gia_sanPham']
                    ,$_POST['giamGia']
                    ,$_POST['moTa']
                    ,$_POST['mauSac']
                    ,$_POST['ban']
                    ,$_POST['soLuong']
                    ,$_POST['ten_thuongHieu']
                    ,$_POST['ma_danhMuc']); 
                    
                    if ($kq) {
                        if($_FILES['anh']['error'==0]){
                        $kq = move_uploaded_file($_FILES['anh']['tmp_name'],
                        'upload/product/'.$_FILES['anh']['name']);
                        }   
                        if ($kq) {
                            echo "Cập nhật thành công!";
                            header("Location:?mod=product&act=admin_product");

                        }else{
                            echo "Cập nhật that bai!";
                        }
                    } 
                }
                    
                include_once "view/layout/header.php";
                include_once "view/product_add.php";
                include_once "view/layout/footer.php";
     
            
        break;
        case 'edit':
           
            require_once '../../Project1_Group-TechZone/model/pdo.php';
            require_once '../../Project1_Group-TechZone/model/products.php';
            $data['dsdm']=get_danhmuc();
            $data['dstH']=get_thuongHieu();
            if(isset($_GET['id'])){

                $data['sp']=get_product($_GET['id']);
            }
            if (isset($_POST['submit-edit'])) {
                print_r([/* 'id' => $_GET['id'],
                    'ten_sanPham' => $_POST['ten_sanPham'],
                    'gia_sanPham' => $_POST['gia_sanPham'],
                    'giamGia' => $_POST['giamGia'],
                    'moTa' => $_POST['moTa'],
                    'ban' => $_POST['ban'],
                    'soLuong' => $_POST['soLuong'],
                    'ma_danhMuc' => $_POST['ma_danhMuc'] */
                ]);
                $kq = edit_product(
                    $_GET['id'], 
                    $_POST['ten_sanPham'], 
                    $_FILES['hinh_Anh']['name'],
                    $_POST['gia_sanPham'], 
                    $_POST['giamGia'], 
                    $_POST['moTa'], 
                    $_POST['mauSac'],
                    $_POST['ban'], 
                    $_POST['soLuong'], 
                    $_POST['ten_thuongHieu'],
                    $_POST['ma_danhMuc']
                );
                if ($kq) {
                    if($_FILES['anh']['error'==0]){
                        $kq = move_uploaded_file($_FILES['anh']['tmp_name'],
                        'upload/product/'.$_FILES['anh']['name']);
                    }
                    if($kq){
                        echo "Cập nhật thành công!";
                        header("Location:?mod=product&act=admin_product");
                    }
                } else {
                    echo "Cập nhật thất bại!";
                }
            }
            
                
                include_once "view/layout/header.php";
                include_once "view/product_edit.php";
                include_once "view/layout/footer.php";
     break;
     case'delete':
                require_once '../../Project1_Group-TechZone/model/pdo.php';
        require_once '../../Project1_Group-TechZone/model/products.php';
        if(isset($_GET['id'])){
            $kq=delete_Product($_GET['id']);
            if($kq){
                $thongbao="Đã xóa sản phẩm [".$_GET['id']."]thành công";
                header("Location:?mod=product&act=admin_product");
            }else{
                $thongbao="Đã có lỗi không mông muốn";
            };
        }
        break;
            case'search':
                        require_once '../../Project1_Group-TechZone/model/pdo.php';
                require_once '../../Project1_Group-TechZone/model/products.php';
            
                if(isset($_GET['keyword'])){
                    $data['dssp']= search_products($_GET['keyword']);
                }
                
                
                include_once "view/layout/header.php";
                include_once "view/product_search.php";
                include_once "view/layout/footer.php";
                break;
    default:
        # code...
        break;
}
}else{
    header("Location: ?mod=page&act=home");
}