<h2 class="">
    Chi Tiết Đơn Hàng <?=$order['ma_donHang']?>
    <?php 
switch ($order['trangThai']) {
    case 'gio-hang':
        echo '<span class="status gio-hang">Chờ xác nhận</span>';
        break;
    case 'cho-van-chuyen':
        echo '<span class="status cho-van-chuyen">Chờ vận chuyển</span>';
        break;
    case 'dang-van-chuyen':
        echo '<span class="status dang-van-chuyen">Đang vận chuyển</span>';
        break;
    case 'da-van-chuyen':
        echo '<span class="status da-van-chuyen">Đã vận chuyển</span>';
        break;
    default:
        echo '<span class="status">Trạng thái không xác định</span>';
        break;
}
?>
</h2>
<div class="">
  <div class="">
    <table class="" >
      <tbody>
        <tr>
          <th>Khách hàng</th>
          <td><?=$order['ten_nguoiDung']?></td>
        </tr>
        <tr>
          <th>Ngày đặt</th>
          <td><?=$order['ngay']?></td>   
        </tr>
        <tr>
          <th>Địa chỉ</th>
          <td><?=$order['diaChi']?></td>
        </tr>
        <tr>
          <th>SĐT</th>
          <td><?=$order['soDienthoai']?></td>
        </tr>
        <tr>
          <th>Mã sản phẩm </th>
          <td><?=$order['ma_sanPham']?></td>
        </tr>
        <tr>
          <th>Tổng tiền</th>
          <td><?=$order['tongTien']?></td>
        </tr>
        <tr>
</td>

        </tr>
      </tbody>
    </table>
  </div>
  <div class="">
    <table class="table">
      <thead>
        <tr>
                <th>Mã Chi Tiết Đơn Hàng</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Mã đơn hàng</th>
                <th>Mã sản phẩm</th>
                
        </tr>
      </thead>
      <tbody>
        <tr>
            <?php foreach ($orderDetail as $key): ?>
            <td><?=$key['ma_chiTietdonHang']?></td>
          <td><?=$key['soLuong']?></td>
          <td><?=$key['donGia']?></td>
          <td><?=$key['ma_donHang']?></td>
          <td><?=$key['ma_sanPham']?></td>
          <?php endforeach;?>
        </tr>
      </tbody>
    </table>
  </div>
</div>