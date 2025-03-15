
<div class="container">
    <h2>Thêm sản phẩm</h2>
    <form action="" method="POST" enctype="multipart/form-data"> <!-- dung de upload hinh anh -->
        <input type="text" name="ten_sanPham" placeholder="Tên sản phẩm"><br>
        <input type="number" name="gia_sanPham" placeholder="Giá sản phẩm"><br>
        <input type="number" name="giamGia" placeholder="Giá khuyến mãi"><br>
        <input type="text" name="moTa" placeholder="Mô tả"><br>
        <input type="text" name="mauSac" placeholder="Mau sac"><br>
        <input type="number" name="ban" placeholder="so luot da ban ra"><br>
        <input type="number" name="soLuong" placeholder="Số lượng"><br>
         <input type="file" name="anh" placeholder="Anh"><br> 
        <select name="ma_danhMuc">
            <?php   foreach($data['dsdm'] as $dm): ?>
            <option value="<?=$dm['ma_danhMuc']?>">
                <?=$dm['ten_danhMuc']?>
            </option>
         
            <?php endforeach;?>
        </select>
        <br>
        <input type="submit" name="submit-add" value="Thêm sản phẩm">
    </form>
</div>