<?php
include_once '../../Project1_Group-TechZone/model/m_base.php';
$model = new m_Blog();
$data = $model->getAllBlog();
 ?>
<div class="category-management">
  <header>
    <h2>Quản lý bài viết</h2>
        <a href="?mod=blog&act=addBlog">
        <button type="submit" class="add-category-btn">+ Thêm danh mục mới</button></a>
    </form>
  </header>
  <div class="category-table">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Mô tả</th>
          <th>Tiêu Đề</th>  
          <th>Trạng thái</th>
          <th>Thời Gian Khởi Tạo</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach($data as $cate): ?>
        <tr>
          <td><?=$cate["ma_baiViet"]?></td>
          <td style="width:35%;"><?=$cate["moTa"]?></td>
          <td style="width:200px;"><?=$cate["tieuDe"];?></td>
          <td><?=$cate["trangThai"] == 1? 'Hoạt động' : 'Không hoạt đông';?></td>
          <td><?=$cate["ngayKhoitao"]?></td>
          <td>
          <a href="?mod=blog&act=updateBlog&ma_baiViet=<?=$cate["ma_baiViet"]?>" style="text-decoration:none">
            <button id="edit-btn">Sửa</button>
            </a>
            <a href="?mod=blog&act=deleteBlog&ma_baiViet=<?= $cate['ma_baiViet']?>" >
            <button id="edit-btn">Delete</button></a>
          </td>
        </tr>
        <?php endforeach;?>

      </tbody>
    </table>
  </div>
</div>
