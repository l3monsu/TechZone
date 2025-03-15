<h2>Danh sách người dùng</h2>
<form action=""id="search" method="get">
            <div class="">
                <i class=""></i>
                <input type="hidden" name="mod" value="user" >
                <input type="hidden" name="act" value="search" >
                <input type="text" name="keyword" placeholder="Tim Kiem" >
                <input type="submit" name="submit" value="Tim">
            </div>
        </form>
<br>
<table border="1">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Email</th>
        <th>SĐT</th>
        <th>Vai trò</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>
    <?php $i=1 ;
    foreach ($user as $us): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $us['Ten_nguoiDung'] ?></td>
            <td><?= $us['email_nguoiDung'] ?></td>
            <td><?= $us['sDt_nguoiDung'] ?></td>
            <td><?= $us['vaiTro'] == 1 ? 'Admin' : 'User' ?></td>
            <td><?= $us['trang_Thai'] == 0 ? 'Bình thường' : 'Bị ẩn' ?></td>
            <td>
                <a href="?mod=user&act=user&action=role&id=<?= $us['ma_nguoiDung'] ?>"
                    onclick="return confirm('Bạn có chắc chắn muốn thay đổi vai trò người dùng này?')">
                    <?= $us['vaiTro'] == 1 ? 'User' : 'Admin' ?>
                </a>
                <a href="?mod=user&act=user&action=status&id=<?= $us['ma_nguoiDung'] ?>"
                    onclick="return confirm('Bạn có chắc chắn muốn thay đổi trạng thái người dùng này?')">
                    <?= $us['trang_Thai'] == 0 ? 'Ẩn' : 'Bỏ ẩn' ?>
                </a>
            </td>
            </td>
        </tr>
    <?php endforeach; ?>
</table>