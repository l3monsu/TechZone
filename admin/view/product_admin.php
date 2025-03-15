<table class="table">
    <thead>
        
        

        <h2>Sản phẩm</h2>
        <header>
         
           <form action=""id="search" method="get">
            <div class="">
                <input type="hidden" name="mod" value="product" >
                <input type="hidden" name="act" value="search" >
                <input type="text" name="keyword" placeholder="Tim Kiem" >
                <input type="submit" name="submit" value="Tim">
            </div>
        </form>
        
        </header>     
        <a href="?mod=product&act=add" class="themsanpham">THÊM SẢN PHẨM</a>  
        <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Giá giảm</th>
            <th>Mô tả</th>
            <th>Bán</th>
            <th>Màu sắc</th>
            <th>Số lượng</th>
            <th>Thương Hiệu</th>
            <th>Hành động</th>
        </tr>
    </thead>
    
    <?php
    $i=1+($page-1)*10;
    foreach ($data['dssp'] as $sp): ?>
    <tbody> 
        

       

   <tr>
    <td><?=$i++?></td>
   <td><img src="<?=$baseUrl?>/upload/product/<?=$sp['hinh_Anh']?>" alt="" width="60px"></td>
    <td><?=$sp['ten_sanPham']?></td>
    <td> <del><?=$sp['giamGia']?>d</del></td>
    <td><?=$sp['gia_sanPham']?>d</td>
    <td><?=$sp['moTa']?></td>
    <td><?=$sp['ban']?></td>
    <td><?=$sp['mauSac']?></td>
    <td><?=$sp['soLuong']?></td>
    <td><?=$sp['ten_thuongHieu']?></td>
    <td>
    <a href="?mod=product&act=edit&id=<?=$sp['ma_sanPham']?>">Sửa </a>
    <a onclick="deleteProduct(<?=$sp['ma_sanPham']?>)" href="?mod=product&act=delete&id=<?=$sp['ma_sanPham']?>">Xóa</a>
    </td>
   </tr>
   <?php  endforeach;?>
   <?php for($i = 1; $i <= $sotrang; $i++): ?>
    <td>  
        <a href="?mod=product&act=admin_product&page=<?= $i ?>">
        <?= $i ?></a>
        <?php endfor; ?>  
   </td>
</tbody>

</table>