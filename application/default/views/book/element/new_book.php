<?php 
$xhtmlBookNew = '';
// Duyệt mảng in ra các sách mới ( ORDER BY `created` DESC )
if (!empty($this->listItemsNew)) {

    $indexNewB = 1;
    foreach ($this->listItemsNew as $itemNewB) {
        $idNewB             = $itemNewB['book_id'];
        $nameNewBURL        = URL::filterURL($itemNewB['book_name']);
        $catNameNewBURL     = URL::filterURL($itemNewB['category_name']);
        $linkInfoItem       = URL::createLink($this->arrParam['module'], 'book', 'item', ['bid' => $idNewB], "$catNameNewBURL/$nameNewBURL-$idNewB.html");
        if ($indexNewB == 1) {
            $xhtmlBookNew .= '<div>';
        }

        $img            = UPLOAD_BOOK_URL . $itemNewB['picture'];
        $xhtmlBookNew .= '<div class="media">
                <a href="' . $linkInfoItem . '">
                    <img class="img-fluid blur-up lazyload" src="' . $img . '" alt="Special Book" style="width: 130px; height: 160px"></a>
                <div class="media-body align-self-center">
                <!--
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                -->
                    <a href="' . $linkInfoItem . '">
                        <h6>' . $itemNewB['book_name'] . '</h6>
                    </a>                        
                    <h4 class="text-lowercase">' . HelperFrontend::currencyVND($itemNewB['price_discount']) . ' đ</h4>
                </div>
            </div>';
        $indexNewB++;
        if ($indexNewB == 4) {
            $xhtmlBookNew .= '</div>';
            $indexNewB = 1;
        }
    }
} else {
    $xhtmlBookNew = '<p class="font-weight-bold text-muted text-center">Đang cập nhật sách !</p>';
}
?>

<div class="theme-card mt-4">
    <h5 class="title-border">Sách mới</h5>
    <div class="offer-slider slide-1">
        <?= $xhtmlBookNew ?>
    </div>
</div>