<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/blog.css">
</head>
<body>
    
<form method="POST" action="?mod=blog&act=addBlog" enctype="multipart/form-data">
    <input type="hidden" name="ma_baiViet" value="<?= $blog['ma_baiViet'] ?>" />
    
    <!-- Trường mô tả chi tiết -->
    <div class="form-group">
        <label for="mota_chitiet">Mô tả chi tiết:</label>
        <textarea id="mota_chitiet" name="mota_chitiet" rows="4"></textarea>
    </div>

    <!-- Các trường khác -->
    <div class="form-group">
        <label for="tieuDe">Tiêu đề:</label>
        <input type="text" id="tieuDe" name="tieuDe" required />
    </div>

    <div class="form-group">
        <label for="moTa">Mô Tả:</label>
        <textarea id="moTa" name="moTa" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="trangThai">Trạng Thái:</label>
        <select id="trangThai" name="trangThai" required>
            <option value="Hoạt Động">Hoạt Động</option>
            <option value="Không Hoạt Động">Không Hoạt Động</option>
        </select>
    </div>

    <div class="form-group">
        <label for="hinhAnh">Hình ảnh:</label>
        <input type="file" id="hinhAnh" name="hinhAnh" required />
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-submit">Lưu</button>
        <a href="?mod=blog&act=blog" class="btn-cancel">Thoát</a>
    </div>
</form>
</body>
</html>