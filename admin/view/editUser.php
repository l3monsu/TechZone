<h2>Chỉnh sửa thông tin người dùng</h2>
<form method="POST">
    <label>Tên người dùng:</label>
    <input type="text" name="ten_nguoiDung" value="<?= $data['user']['Ten_nguoiDung'] ?>" required><br>

    <label>Mat khau người dùng:</label>
    <input type="text" name="matKhau_nguoiDung" value="<?= $data['user']['matKhau_nguoiDung'] ?>" required><br>

    <label>Email:</label>
    <input type="email" name="email_nguoiDung" value="<?= $data['user']['email_nguoiDung'] ?>" required><br>

    <label>Số điện thoại:</label>
    <input type="number" name="sDt_nguoiDung" value="<?= $data['user']['sDt_nguoiDung'] ?>" required><br>

    <label>Vai trò:</label>
    <select name="vaiTro">
        <option value="0" <?= $data['user']['vaiTro'] == 0 ? 'selected' : '' ?>>User</option>
        <option value="1" <?= $data['user']['vaiTro'] == 1 ? 'selected' : '' ?>>Admin</option>
    </select><br>

    <button type="submit" name="submit-edit">Lưu thay đổi</button>
</form>
