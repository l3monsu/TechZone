<form method="POST" action="?mod=blog&act=updateBlog&ma_baiViet=<?=$blog['ma_baiViet']?>">
    <input type="hidden" name="ma_baiViet" value="<?= htmlspecialchars($blog['ma_baiViet']) ?>" />

    <div class="form-group">
        <label for="tieuDe">Tiêu đề:</label>
        <input 
            type="text" 
            id="tieuDe" 
            name="tieuDe" 
            value="<?= htmlspecialchars($blog['tieuDe']) ?>" 
            required 
        />
    </div>

    <div class="form-group">
        <label for="moTa">Mô tả:</label>
        <textarea 
            id="moTa" 
            name="moTa" 
            rows="4" 
            required><?= htmlspecialchars($blog['moTa']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="trangThai">Trạng thái:</label>
        <select id="trangThai" name="trangThai" required>
            <option value="Hoạt Động" <?= ($blog['trangThai'] == 1) ? 'selected' : '' ?>>Hoạt Động</option>
            <option value="Không Hoạt Động" <?= ($blog['trangThai'] == 0) ? 'selected' : '' ?>>Không Hoạt Động</option>
</select>

        </select>
    </div>

    <div class="form-actions">
      <a href="?mod=blog&act=blog">
        <button type="submit" class="btn-submit">Lưu</button>
        </a>
        <a href="?mod=blog&act=blog" class="btn-cancel">Thoát</a>
    </div>
</form>
