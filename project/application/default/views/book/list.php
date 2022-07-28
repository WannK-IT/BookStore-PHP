<?php
$xhtmlCategory = $xhtmlBook = $xhtmlBookSpecial =  '';
$search = $this->arrParam['search'] ?? ''; 

// ----------- Duyệt mảng in sidebar category ----------- 
if (!empty($this->listCategories)) {
    $xhtmlCategory .= '<div class="collection-collapse-block-content">
                        <div class="collection-brand-filter">';

    foreach ($this->listCategories as $itemCategory) {
        $idCategory         = $itemCategory['id'];
        $categoryNameURL    = URL::filterURL($itemCategory['name']);
        $linkCategory       = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], $this->arrParam['action'], ['cid' => $idCategory], "$categoryNameURL-$idCategory.html");
        $xhtmlCategory      .= HelperFrontend::sidebar($linkCategory, $itemCategory['name'], $idCategory, @$this->arrParam['cid'], 'category');
    }
    $xhtmlCategory  .= '</div></div>';
} else {
    $xhtmlCategory  = '<p class="font-weight-bold text-muted text-center pt-5">Danh mục đang được cập nhật !</p>';
}

// ----------- Duyệt mảng in danh sách các cuốn sách ----------- 
if (!empty($this->listBooks)) {
    $xhtmlBook .= '<div class="row margin-res">';
    foreach ($this->listBooks as $itemBook) {
        $idBook                 = $itemBook['book_id'];
        $bookNameURL            = URL::filterURL($itemBook['book_name']);
        $categoryNameURL        = URL::filterURL($itemBook['category_name']);
        $book_name              = HelperFrontend::highlightSearch($search, $itemBook['book_name']);
        $imgBook                = UPLOAD_BOOK_URL . $itemBook['picture'];
        $hrefModalView          = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'ajaxLoadInfo', ['id' => $idBook]);
        $linkInfoItem1          = URL::createLink($this->arrParam['module'], 'book', 'item', ['bid' => $idBook], "$categoryNameURL/$bookNameURL-$idBook.html");
        $addCart              = 'javascript:addCart(\'' . $idBook . '\', \'' . $itemBook['price_discount'] . '\')';
        $percent_saleoff = $price_discount = '';
        if ($itemBook['sale_off'] != 0) {
            $percent_saleoff    = '<div class="lable-block">
                                        <span class="lable4 badge badge-danger"> -' . $itemBook['sale_off'] . '%</span>
                                    </div>';
            $price_discount     = '<del>' . HelperFrontend::currencyVND($itemBook['price']) . '&#8363</del>';
        }
        $xhtmlBook .= '<div class="col-xl-3 col-6 col-grid-box">
            <div class="product-box">
                <div class="img-wrapper">
                    ' . $percent_saleoff . '
                    <div class="front">
                        <a href="' . $linkInfoItem1 . '">
                            <img src="' . $imgBook . '" class="img-fluid blur-up lazyload bg-img" alt="">
                        </a>
                    </div>
                    <div class="cart-info cart-wrap">
                        <a href="' . $addCart . '" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                        <a href="javascript:loadModal(\'' . $hrefModalView . '\', \'' . UPLOAD_BOOK_URL . '\')" title="Quick View"><i class="ti-search"></i></a>
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
                    <a href="' . $linkInfoItem1 . '">
                        <h6 class="pb-2">' . $book_name . '</h6>
                    </a>
                    <div class="cs-ellipsis-8"><p>' . $itemBook['description'] . '</p></div>
                    <h4 class="text-lowercase pt-2">' . HelperFrontend::currencyVND($itemBook['price_discount']) . ' &#8363 ' . $price_discount . ' </h4>
                </div>
            </div>
        </div>';
    }
    $xhtmlBook .= '</div>';
} else {
    $xhtmlBook = '<div class="row margin-res d-flex justify-content-center"><p class="font-weight-bold h6 text-muted pt-5 ml-3">Sách đang được cập nhật !</p></div';
}


// Duyệt mảng in ra các sách nổi bật ( `book`.`special` = 'yes' )
if (!empty($this->listItemsSpecial)) {
    $index = 1;
    foreach ($this->listItemsSpecial as $itemSpecial) {
        $idBookSpecial          = $itemSpecial['book_id'];
        $bookSpecialNameURL     = URL::filterURL($itemSpecial['book_name']);
        $categorySpecialNameURL = URL::filterURL($itemSpecial['category_name']);
        $linkInfoItem2          = URL::createLink($this->arrParam['module'], 'book', 'item', ['bid' => $idBookSpecial], "$categorySpecialNameURL/$bookSpecialNameURL-$idBookSpecial.html");

        if ($index == 1) {
            $xhtmlBookSpecial .= '<div>';
        }

        $img            = UPLOAD_BOOK_URL . $itemSpecial['picture'];
        $price          = $itemSpecial['price'] - (($itemSpecial['price'] * $itemSpecial['sale_off']) / 100);

        $xhtmlBookSpecial .= '<div class="media">
                <a href="' . $linkInfoItem2 . '">
                    <img class="img-fluid blur-up lazyload" src="' . $img . '" alt="Special Book" style="width: 130px; height: 160px"></a>
                <div class="media-body align-self-center">
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <a href="' . $linkInfoItem2 . '">
                        <h6>' . $itemSpecial['book_name'] . '</h6>
                    </a>                        
                    <h4 class="text-lowercase">' . HelperFrontend::currencyVND($price) . ' &#8363</h4>
                </div>
            </div>';
        $index++;

        // Mỗi line cho phép hiển thị 6 item book, nếu lớn hơn sẽ chuyển sang line khác
        if ($index == 7) {
            $xhtmlBookSpecial .= '</div>';
            $index = 1;
        }
    }
} else {
    $xhtmlBookSpecial = '<p class="font-weight-bold text-muted text-center">Đang cập nhật !</p>';
}
?>

<!-- Breadcrumb -->
<?php include_once "element/breadcrumb.php" ?>

<section class="section-b-space j-box ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 collection-filter">
                    <!-- side-bar colleps block stat -->
                    <div class="collection-filter-block">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">Danh mục</h3>
                            <?= $xhtmlCategory ?>
                        </div>
                    </div>

                    <div class="theme-card">
                        <h5 class="title-border">Sách nổi bật</h5>
                        <div class="offer-slider slide-1">
                            <?= $xhtmlBookSpecial ?>
                        </div>
                    </div>
                    <!-- silde-bar colleps block end here -->
                </div>
            </div>

            <!-- List Book -->
            <div class="collection-content col">
                <div class="page-main-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="collection-product-wrapper">
                                <?php include_once "element/filter.php" ?>
                                <div class="product-wrapper-grid" id="my-product-list">
                                    <?= $xhtmlBook ?>
                                </div>

                                <!-- Pagination -->
                                <?php include_once "element/pagination.php" ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick-view modal popup start-->
<?= FormFrontend::modalViewProduct() ?>
<!-- Quick-view modal popup end-->