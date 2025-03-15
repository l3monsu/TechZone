<h1>Danh sách đơn hàng</h1>
<table border="1">
    <tr>
        <th>Mã Đơn Hàng</th>
        <th>Tổng Tiền</th>
        <th>Ngày</th>
        <th>Địa Chỉ</th>
        <th>Tên Người Dùng</th>
        <th>Số Điện Thoại</th>
        <th>Mã Người Dùng</th>
        <th>Mã Giảm Giá</th>
        <th>Trạng Thái</th>
        <th>Hành động</th>
    </tr>
    <?php if (!empty($donHangs) && is_array($donHangs)): ?>
        <?php foreach ($donHangs as $donHang): ?>
            <tr>
                <td><?= $donHang['ma_donHang'] ?></td>
                <td><?= number_format($donHang['tongTien'], 0, ',', '.') ?>₫</td>
                <td><?= $donHang['ngay'] ?></td>
                <td><?= $donHang['diaChi'] ?></td>
                <td><?= $donHang['ten_nguoiDung'] ?></td>
                <td><?= $donHang['soDienthoai'] ?></td>
                <td><?= $donHang['ma_nguoiDung'] ?></td>
                <td><?= $donHang['ma_giamGia'] ?></td>
                <td>
                    <?php
                    // Hiển thị trạng thái đơn hàng
                    switch ($donHang['trangThai']) {
                        case 0:
                            echo '<span class="trangThai-0">Đang chờ xác nhận</span>';
                            break;
                        case 1:
                            echo '<span class="trangThai-1">Đã xác nhận</span>';
                            break;
                        case 2:
                            echo '<span class="trangThai-2">Đang giao hàng</span>';
                            break;
                        case 3:
                            echo '<span class="trangThai-3">Đã hủy</span>';
                            break;
                        default:
                            echo '<span class="trangThai-default">Không xác định</span>';
                            break;
                    }
                    ?>
                </td>
                <td>
                    <?php if ($donHang['trangThai'] == 0): ?>
                        <a href="#" class="btn-huy" data-id="<?= $donHang['ma_donHang'] ?>">Hủy</a>
                    <?php else: ?>
                        Không thể hủy
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="10">Không có đơn hàng nào.</td>
        </tr>
    <?php endif; ?>
</table>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-huy').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const maDonHang = this.getAttribute('data-id');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn hủy đơn hàng?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, hủy ngay!',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Chuyển hướng đến URL để hủy đơn hàng
                    window.location.href = `index.php?page=donhang&action=huy&ma_donHang=${maDonHang}`;
                }
            });
        });
    });
</script>

<style>
    h1 {
        text-align: center;
        color: #333;
        margin-top: 30px;
    }

    table {
        width: 95%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        margin-left: 40px;
        margin-top: 30px;
    }

    th,
    td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    /* CSS cho các trạng thái đơn hàng khác nhau */
    .trangThai-0 {
        color: #ff9800;
        /* Màu cam cho "Đang chờ xác nhận" */
    }

    .trangThai-1 {
        color: #4caf50;
        /* Màu xanh lá cho "Đã xác nhận" */
    }

    .trangThai-2 {
        color: #2196f3;
        /* Màu xanh dương cho "Đang giao hàng" */
    }

    .trangThai-3 {
        color: #f44336;
        /* Màu đỏ cho "Đã hủy" */
    }

    .trangThai-default {
        color: #9e9e9e;
        /* Màu xám cho trạng thái không xác định */
    }


    @media (max-width: 768px) {

        th,
        td {
            font-size: 14px;
            padding: 10px;
        }

        h1 {
            font-size: 24px;
        }
    }
</style>