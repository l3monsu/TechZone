<?php
require_once '../../Project1_Group-TechZone/model/m_base.php';
$model = new m_Category();
$data = $model->getAllCategories();
 ?>
<div class="category-management">
  <header>
    <h2>Quản lý danh mục</h2>
        <a href="?mod=cate&act=addCate">
        <button type="submit" class="add-category-btn">+ Thêm danh mục mới</button></a>
  </header>
  <div class="category-table">
    <table>
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên danh mục</th>
          <th>Số lượng sản phẩm</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach($data as $cate): ?>
        <tr>
          <td><?=$cate["ma_danhMuc"]?></td>
          <td><?=$cate["ten_danhMuc"]?></td>
          <td><?=$cate["soLuong"];
              if($cate["soLuong"] >= 100){
                $trangThai = " Hàng Tồn";
              } elseif($cate['soLuong'] <= 100){
                $trangThai = " Sắp Hết";
              }else{
                $trangThai = "Hết Hàng";
              }
                ?></td>
              <td><?=$trangThai?></td>
          <td>
          <a href="?mod=detailCate&act=detailCate&category_id=<?=$cate["ma_danhMuc"]?>">
            <button >Sửa</button></a>
            <a href="?mod=cate&act=deleteCate&ma_danhMuc=<?= $cate['ma_danhMuc']?>" >
            <button >Delete</button></a>
          </td>
        </tr>
        <?php endforeach;?>

      </tbody>
    </table>
  </div>
</div>
