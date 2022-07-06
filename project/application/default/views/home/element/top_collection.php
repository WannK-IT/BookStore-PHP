<?php
$list   = $this->itemsSpecial;
$xhtml  = '';

if (!empty($list)) {
    foreach ($list as $item) {
        $labelSaleOff   = ($item['sale_off'] != 0) ? '<div class="lable-block"><span class="lable4 badge badge-danger"> -' . $item['sale_off'] . '%</span></div>' : '';
        $imageBook      = UPLOAD_BOOK_URL . $item['picture'];
        $linkModalView  = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'ajaxLoadInfo', ['id' => $item['id']]);
        $linkItemBook   = URL::createLink($this->arrParam['module'], 'book', 'item', ['bid' => $item['id']]);

        $xhtml .= '<div class="product-box">
            <div class="img-wrapper">
                ' . $labelSaleOff . '
                <div class="front">
                    <a href="' . $linkItemBook . '">
                        <img src="' . $imageBook . '" class="img-fluid blur-up lazyload bg-img" alt="product">
                    </a>
                </div>
                <div class="cart-info cart-wrap">
                    <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                    <a href="javascript:loadModal(\'' . $linkModalView . '\', \'' . UPLOAD_BOOK_URL . '\')" title="Quick View"><i class="ti-search"></i></a>
                </div>
            </div>
            <div class="product-detail">
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <a href="' . $linkItemBook . '">
                    <h6 class="cs-ellipsis-4 pb-0">' . $item['description'] . '</h6>
                </a>
                <h4 class="text-lowercase pt-2">' . number_format($item['price_discount'], 0, '', ',') . ' đ <del>' . number_format($item['price'], 0, '', ',') . ' đ</del></h4>
            </div>
        </div>';
    }
} else {
    $xhtml = '<p class="font-weight-bold text-center">Chưa có sản phẩm nổi bật</p>';
}
?>

<!-- Title-->
<div class="title1 section-t-space title5">
    <h2 class="title-inner1">Sản phẩm nổi bật</h2>
    <hr role="tournament6">
</div>

<!-- Product slider -->
<section class="section-b-space p-t-0 j-box ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-4 product-m no-arrow">
                    <?= $xhtml ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product slider end -->