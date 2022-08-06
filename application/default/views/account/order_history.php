<?php
$xhtml = '';

if (!empty($this->orders)) {
    foreach ($this->orders as $item) {
        $order_id       = $item['id'];
        $date           = date('d/m/Y H:i:s', strtotime($item['date']));
        $status         = ($item['status'] == 'active') ? '<span class="text-success">Đã giao hàng</span>' : '<span class="text-warning">Đang xử lý</span>';

        $arrBookID      = json_decode($item['books']);
        $arrPrice       = json_decode($item['prices']);
        $arrQty         = json_decode($item['quantities']);
        $arrBookName    = json_decode($item['names']);
        $arrBookImg     = json_decode($item['pictures']);

        $xhtml .= '<div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <button style="text-transform: none;" class="btn btn-link collapsed mr-2" type="button" data-toggle="collapse" data-target="#' . $order_id . '">Mã đơn hàng: ' . $order_id . ' ('.count($arrBookID).' sản phẩm)</button>
                    <span class="mr-4">Thời gian: ' . $date . '</span>
                    ' . $status . '
                </h5>
            </div>
            <div id="' . $order_id . '" class="collapse" data-parent="#accordionExample" style="">
                <div class="card-body table-responsive">
                    <table class="table btn-table">
                        <thead>
                            <tr>
                                <td>Hình ảnh</td>
                                <td>Tên sách</td>
                                <td>Giá</td>
                                <td>Số lượng</td>
                                <td>Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>';
        $sum_price          = 0;
        foreach ($arrBookID as $keyBook => $itemBook) {
            $book_name      = $arrBookName[$keyBook];
            if(file_exists(UPLOAD_BOOK_PATH . $arrBookImg[$keyBook])){
                $book_img       = UPLOAD_BOOK_URL . $arrBookImg[$keyBook];
                $linkViewBook   = URL::createLink($this->arrParam['module'], 'book', 'item', ['bid' => $itemBook]);
            }else{
                $book_img       = IMG_ADMIN_URL . 'no-image.jpg';
                $linkViewBook   = 'not-found.html';
            }
            $book_price     = $arrPrice[$keyBook];
            $book_qty       = $arrQty[$keyBook];
            $total_price    = intval($book_price) * intval($book_qty);
            $sum_price      += $total_price;

            $xhtml          .= '<tr>
                    <td><a href="' . $linkViewBook . '"><img src="' . $book_img . '" alt="' . $book_name . '" style="width: 80px"></a></td>
                    <td style="min-width: 200px">' . $book_name . '</td>
                    <td style="min-width: 100px">' . number_format($book_price) . ' &#8363;</td>
                    <td>' . $book_qty . '</td>
                    <td style="min-width: 150px">' . number_format($total_price) . ' &#8363;</td>
                </tr>';
        }

        $xhtml .= '</tbody>
                        <tfoot>
                            <tr class="my-text-primary font-weight-bold">
                                <td colspan="4" class="text-right">Tổng: </td>
                                <td>' . number_format($sum_price) . ' &#8363;</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>';
    }
} else {
    $xhtml = '<p class="text-center h6 font-weight-bold text-muted">Bạn chưa đặt đơn hàng nào</p>';
}
?>

<?php include_once "element/breadcrumb.php" ?>
<section class="faq-section section-b-space">
    <div class="container">
        <div class="row">
            <?php include_once "element/sidebar.php" ?>
            <div class="col-lg-9">
                <div class="accordion theme-accordion" id="accordionExample">
                    <div class="accordion theme-accordion" id="accordionExample">
                        <?= $xhtml ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>