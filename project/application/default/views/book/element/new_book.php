<?php 
$xhtmlBookNew = '';
// Duyệt mảng in ra các sách mới ( ORDER BY `created` DESC )
if (!empty($this->listItemsNew)) {

    $index = 1;
    foreach ($this->listItemsNew as $item) {
        $idNewB             = $item['book_id'];
        $nameNewBURL        = URL::filterURL($item['book_name']);
        $catNameNewBURL     = URL::filterURL($item['category_name']);
        $linkInfoItem       = URL::createLink($this->arrParam['module'], 'book', 'item', ['bid' => $idNewB], "$catNameNewBURL/$nameNewBURL-$idNewB.html");
        if ($index == 1) {
            $xhtmlBookNew .= '<div>';
        }

        $img            = UPLOAD_BOOK_URL . $item['picture'];
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
                        <h6>' . $item['book_name'] . '</h6>
                    </a>                        
                    <h4 class="text-lowercase">' . HelperFrontend::currencyVND($item['price_discount']) . ' đ</h4>
                </div>
            </div>';
        $index++;
        if ($index == 4) {
            $xhtmlBookNew .= '</div>';
            $index = 1;
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