<?php
$xhtml = '';
// @$search = $this->arrParam['search_value'];

if (!empty($this->listOrder)) {

    foreach ($this->listOrder as $item) {
        $order_id       = HelperBackend::highlightSearch($this->arrParam['search_value'] ?? '', $item['id']);
        $fullname       = HelperBackend::highlightSearch($this->arrParam['search_value'] ?? '', $item['fullname']);
        $email          = HelperBackend::highlightSearch($this->arrParam['search_value'] ?? '', $item['email']);
        $phone          = HelperBackend::highlightSearch($this->arrParam['search_value'] ?? '', $item['phone']);
        $address        = $item['address'];
        $status         = HelperBackend::selectBox('status_order', 'status_order', ['inactive' => 'Chưa xử lý', 'active' => 'Đã xử lý'], $item['status'], $order_id, true);
        $date           = $item['date'];
        
        $arrBookID      = json_decode($item['books']);
        $arrPrice       = json_decode($item['prices']);
        $arrQty         = json_decode($item['quantities']);
        $arrBookName    = json_decode($item['names']);
        $linkViewOrder  = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'viewOrder', ['order_id' => $order_id]);


        $xhtml .= '<tr>
            <td class="text-center">' . $order_id . '</td>
            <td class="text-wrap" style="min-width: 300px">
                <p class="mb-0"><b>Họ tên:</b> ' . $fullname . '</p>
                <p class="mb-0"><b>Email:</b> ' . $email . '</p>
                <p class="mb-0"><b>Số điện thoại:</b> ' . $phone . '</p>
                <p class="mb-0"><b>Địa chỉ:</b> ' . $address . '</p>
            </td>
            <td class="text-center position-relative">
                ' . $status . '
            </td>
            <td class="text-wrap" style="max-width: 300px">';

        $sum_price = 0;
        foreach ($arrBookID as $keyBook => $itemBook) {
            $book_name      = $arrBookName[$keyBook];
            $book_price     = $arrPrice[$keyBook];
            $book_qty       = $arrQty[$keyBook];
            $total_price    = intval($book_price) * intval($book_qty);
            $sum_price      += $total_price;
            $xhtml .= '<div class="my-3"><h6 class="mb-0"><i class="fas fa-book pr-1 text-info"></i> ' . $book_name . '</h6>';
            $xhtml .= '<p class="mb-0"><i class="fas fa-coins text-warning"></i> <span class="mx-1">' . number_format($book_price) . ' &#8363;</span> x <span class="badge badge-info badge-pill mx-1">' . $book_qty . '</span> = <span class="mx-1">' . number_format($total_price) . ' &#8363;</span></p></div>';
        }

        $xhtml .= '</td>
            <td class="text-center">' . number_format($sum_price) . ' &#8363;</td>
            <td class="text-center">' . date('d/m/Y H:i:s', strtotime($date)) . '</td>
            <td class="text-center">
                <a href="' . $linkViewOrder . '" class="py-2 rounded-circle btn btn-sm btn-primary" title="" data-toggle="tooltip" data-original-title="View">
                    <i class="fas fa-eye"></i>
                </a>
            </td>
        </tr>';
    }
} else {
    $xhtml = HelperBackend::showEmptyRow(6, 'Chưa có đơn hàng nào !');
}

if (isset($_SESSION['message'])) {
    echo '<div id="add-success" class="alert bg-gradient-success font-weight-bold" style="font-size: 15px;" role="alert">' . $_SESSION['message'] . '</div>';
    Session::delete('message');
}
?>

<!-- Search & Filter -->
<?php require_once "elements/search_filter.php" ?>

<!-- List -->
<div class="card card-info card-outline">
    <?php require_once "elements/card-header.php" ?>
    <div class="card-body">

        <!-- List Content -->
        <table class="table table-bordered text-nowrap btn-table mb-0">
            <thead>
                <tr>
                    <th class="text-center">Mã đơn hàng</th>
                    <th class="text-center">Thông tin</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Chi tiết</th>
                    <th class="text-center">Tổng tiền</th>
                    <th class="text-center">Ngày đặt</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?= $xhtml ?>
            </tbody>
        </table>

        <!-- End List -->
    </div>
    <?php require_once "elements/pagination.php"?>
</div>