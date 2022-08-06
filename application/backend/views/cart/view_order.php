<?php
$xhtml      = '';
$sumPrice   = 0;
$linkCart       = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'index');
$info           = $this->infoOrder;
$book_id        = json_decode($info['books']);
$book_price     = json_decode($info['prices']);
$book_qty       = json_decode($info['quantities']);
$book_name      = json_decode($info['names']);
$book_pic       = json_decode($info['pictures']);
foreach ($book_id as $keyBook => $valueBook) {
    $img        = (file_exists(UPLOAD_BOOK_PATH . $book_pic[$keyBook])) ? UPLOAD_BOOK_URL . $book_pic[$keyBook] : IMG_ADMIN_URL . 'no-image.jpg';
    $name       = $book_name[$keyBook];
    $price      = $book_price[$keyBook];
    $qty        = $book_qty[$keyBook];
    $total      = intval($price) * intval($qty);
    $sumPrice   += $total; 
    $xhtml  .= '<tr>
                    <td style="width: 120px; padding: 10px">
                        <a href="javascript:modalImg(\'' . $img . '\')">
                            <img class="item-image w-100" src="' . $img . '">
                        </a> 
                    </td>
                    <td class="text-wrap" style="min-width: 180px">' . $name . '</td>
                    <td class="text-center">' . number_format($price) . ' &#8363;</td>
                    <td class="text-center">' . $qty . '</td>
                    <td class="text-center">' . number_format($total) . ' &#8363;</td>
                </tr>';
}
?>

<div class="card card-info card-outline">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center mx-4">
            <span style="font-size: 1rem"><i class="fas fa-clipboard-list pr-2"></i><b>Mã đơn hàng: </b> <?= $info['id'] ?></span>
            <span style="font-size: 1rem"><i class="fas fa-user pr-2"></i><b>Khách hàng:</b> <?= $info['fullname'] ?></span>
            <span style="font-size: 1rem"><i class="fas fa-calendar-check pr-2"></i><b>Ngày đặt:</b> <?= date("d/m/Y H:i:s", strtotime($info['date'])) ?></span>
            <span style="font-size: 1rem"><i class="fas fa-spinner pr-2"></i><b>Trạng thái:</b> <?= ($info['status'] == 'inactive') ? 'Chưa xử lý' : 'Đã xử lý' ?></span>
            <a href="<?= $linkCart?>" class="btn-sm btn-info"><i class="fas fa-arrow-left fa-sm"></i> Quay lại</a>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
                <thead>
                    <tr>
                        <th class="text-center">Hình ảnh</th>
                        <th>Tên sách</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $xhtml ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        <p class="text-right h6 font-weight-bold">Tổng tiền: <?= number_format($sumPrice) ?> &#8363;</p>
    </div>
</div>

<!-- Quick-view modal popup start-->
<?= FormBackend::modalViewImg() ?>
<!-- Quick-view modal popup end-->