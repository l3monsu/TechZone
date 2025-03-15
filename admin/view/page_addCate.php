<form action="?mod=cate&act=addCate" method="POST" class="danhmuc-form" style="display: flex;">
        <div class="form-group">
            <label for="ten_danhMuc">Tên Danh Mục:</label>
            <input type="text" id="ten_danhMuc" name="ten_danhMuc" required>
        </div>
        <div class="form-group" style="margin: 0px 20px;">
            <label for="soLuong">Số Lượng:</label>
            <input type="text" id="soLuong" name="soLuong" required>
        </div>        
        <a href="?mod=cate&act=addCate">
        <button type="submit" class="add-category-btn">+ Thêm danh mục mới</button></a>
        </form>