

    <h2>Sửa sản phẩm</h2>
    <form action="" method="POST" enctype="multipart/form-data"> <!-- dung de upload hinh anh -->
        <input type="text" name="ten_sanPham" placeholder="Tên sản phẩm" value="<?=$data['sp']['ten_sanPham']?>"><br>
        <input type="number" name="gia_sanPham" placeholder="Giá sản phẩm" value="<?=$data['sp']['gia_sanPham']?>"><br>
        <input type="number" name="giamGia" placeholder="Giá khuyến mãi"value="<?=$data['sp']['giamGia']?>"><br>
        <input type="text" name="moTa" placeholder="Mô tả"value="<?=$data['sp']['moTa']?>"><br>
        <input type="text" name="mauSac" placeholder="Mô tả"value="<?=$data['sp']['mauSac']?>"><br>
        <input type="number" name="ban" placeholder="so luot da ban ra"value="<?=$data['sp']['ban']?>"><br>
        <input type="number" name="soLuong" placeholder="Số lượng"value="<?=$data['sp']['soLuong']?>"><br>
         <input type="file" name="hinh_Anh" placeholder="Anh" ><br> 
        <select name="ma_danhMuc">
            <?php foreach ($data['dsdm'] as $dm): ?>
        <option value="<?= $dm['ma_danhMuc'] ?>" <?= $dm['ma_danhMuc'] == $data['sp']['ma_danhMuc'] ? 'selected' : '' ?>>
            <?= $dm['ten_danhMuc'] ?>
        </option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" name="submit-edit" value="Lưu thây đổi" >
    </form>