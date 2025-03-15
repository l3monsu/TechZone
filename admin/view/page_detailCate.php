<div class="category-management">
  <header>
    <h2>Danh mục <?=$category_id?></h2>
    <form method="POST" action="?mod=&act=updateCate&id=<?= $category_id; ?>">
      <div class="form-group">
        <label for="category_name">Tên danh mục:</label>
        <input type="text" id="category_name" name="category_name" value="<?= htmlspecialchars($category_name); ?>" required>
      </div>
      <div class="form-group">
        <label for="category_code">Mã danh mục:</label>
        <input type="text" id="category_code" name="category_code" value="<?= $category_id?>" required>
      </div>
      <button type="submit" class="btn-submit">Cập nhật danh mục</button>
    </form>

  </header>
  <div class="category-table">
    <table>
      <thead>
        <tr>
          <th>ID sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Giá</th>
          <th>Số lượng đã bán</th>
          <th>Số lượng sản phẩm</th>
          <th>Trạng Thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($products)): ?>
          <?php foreach ($products as $product): ?>
            <tr>
              <td><?= $product['ma_sanPham']; ?></td>
              <td><?= $product['ten_sanPham']; ?></td>
              <td><?= number_format($product['gia_sanPham']); ?> VNĐ</td>
              <td><?= $product['ban']; ?></td>
              <td><?=$product["soLuong"];
              if($product["soLuong"] >= 100){
                $trangThai = " Hàng Tồn";
              } elseif($product['soLuong'] <= 100){
                $trangThai = " Sắp Hết";
              }else{
                $trangThai = "Hết Hàng";
              }
                ?></td>
              <td><?=$trangThai?></td>
              <td>
                <a href="?mod=product&act=edit&id=<?= $product['ma_sanPham'];?>">
                  <button >Sửa</button>
                </a>
                <a href="?mod=product&act=delete&id=<?=$product['ma_sanPham'];?>">
                 <button  id="delete-btn" onclick="deleteProduct(<?= $product; ?>)">Xóa</button>
                </a>
                </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7">Không có sản phẩm nào trong danh mục này.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
