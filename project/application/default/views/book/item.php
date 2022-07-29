<?php
$xhtmlInfoBook  = $xhtmlComment = '';
$item           = $this->infoItem;
$listComment    = $this->listComment;
$imgBook        = UPLOAD_BOOK_URL . $item['picture'];
$linkBuy        = 'javascript:addCart(\'' . $item['id'] . '\', \'' . $item['price_discount'] . '\', quantity)';

if ($item['sale_off'] != 0) {
    $price = '<h4><del>' . HelperFrontend::currencyVND($item['price']) . ' &#8363</del><span> -' . $item['sale_off'] . '%</span></h4>
                <h3>' . HelperFrontend::currencyVND($item['price_discount']) . ' &#8363</h3>';
} else {
    $price = '<h3>' . HelperFrontend::currencyVND($item['price_discount']) . ' &#8363</h3>';
}

// Kiểm tra phần bình luận đã login
if (Authentication::checkLoginDefault() == true) {
    $comment_place  = '<div class="col-sm-12">
        <b>' . $_SESSION['loginDefault']['fullnameUser'] . '</b>
        <div id="user_typing_comment" class="my-2">
            <form method="POST" id="form-comment">
                <textarea id="comment_place" name="comment" style="padding: 10px" cols="120" rows="5" placeholder="Viết bình luận..."></textarea>
                <input type="hidden" name="book_id" value="' . $item['id'] . '">
                <div class="d-flex justify-content-end mt-2"><a href="javascript:comment()" class="btn btn-solid" value="Bình luận" >Bình luận</a></div>
            </form>
        </div>
    </div>';
} else {
    $urlLogin       = URL::createLink('default', 'account', 'login', null, 'dang-nhap.html');
    $urlRegister    = URL::createLink('default', 'account', 'register', null, 'dang-ky.html');
    $comment_place  = '<p class="text-center font-weight-bold mb-3">Chỉ có thành viên mới có thể bình luận. Vui lòng <a href="' . $urlLogin . '">đăng nhập</a> hoặc <a href="' . $urlRegister . '">đăng ký.</a> </p>';
}

//----------------  In comment ---------------- 
if (!empty($listComment)) {
    $index = 1;
    foreach ($listComment as $itemComment) {
        if ($index > 7) {
            $bid = $this->arrParam['bid'];
            $linkLoadMore = 'javascript:loadMoreComment(\'' . $bid . '\')';
            $xhtmlComment .= '<div class="text-center"><a href="' . $linkLoadMore . '" class="btn btn-solid see-more-comment">Xem thêm</a></div>';
            break;
        } else {
            $xhtmlComment .= '<div class="row my-5">
            <div class="col-sm-2">
                <p class="text-dark p-0"><strong>' . $itemComment['fullname'] . '</strong></p>
                <p class="text-muted mt-1 p-0" style="font-size: 12px">' . date('d/m/Y', strtotime($itemComment['created'])) . '</p>
            </div>
            <div class="col-sm-10"><p class="p-0">' . $itemComment['text'] . '</p></div>
        </div>';
            $index++;
        }
    }
} else {
}

//----------------  In thông tin sách ---------------- 
$xhtmlInfoBook = '<div class="col-lg-9 col-sm-12 col-xs-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="filter-main-btn mb-2"><span class="filter-btn"><i class="fa fa-filter" aria-hidden="true"></i> filter</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="product-slick">
                        <div><img src="' . $imgBook . '" alt="" class="img-fluid w-100 blur-up lazyload image_zoom_cls-0"></div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-8 rtl-text">
                    <div class="product-right ml-3">
                        <h2 class="mb-2">' . $item['name'] . '</h2>
                        ' . $price . '
                        <div class="product-description border-product">
                            <h6 class="product-title">Số lượng</h6>
                            <div class="qty-box">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-left-minus btn-qty" data-type="minus" data-field="">
                                            <i class="ti-angle-left"></i>
                                        </button>
                                    </span>
                                    <input type="number" autocomplete="off" name="quantity" class="form-control input-number quantity-box" value="1">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-right-plus btn-qty" data-type="plus" data-field="">
                                            <i class="ti-angle-right"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="product-buttons">
                            <a href="' . $linkBuy . '" class="btn btn-solid ml-0 btn-add-item-cart"><i class="fa fa-cart-plus"></i> Chọn mua</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="tab-product m-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Mô tả sản phẩm</a>
                                <div class="material-border"></div>
                            </li>

                            <li class="nav-item"><a class="nav-link" id="comment-section-tab" data-toggle="tab" href="#comment-section" role="tab" aria-selected="false">Bình luận</a>
                                <div class="material-border"></div>
                            </li>
                        </ul>
                        <div class="tab-content nav-material" id="top-tabContent">
                            <div class="tab-pane fade show active ckeditor-content" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <p><strong>' . $item['name'] . '</strong></p>
                                <p>' . $item['description'] . '</p>
                            </div>

                            <div class="tab-pane fade ckeditor-content" id="comment-section" role="tabpanel" aria-labelledby="comment-section-tab">
                                <div class="container my-3">
                                    ' . $comment_place . '
                                    
                                    <div class="col-sm-12">
                                        <p class="p-0 count-comment">' . count($listComment) . ' bình luận</p>
                                        <div class="comment-area">
                                            ' . $xhtmlComment . '
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>';
?>
<?php include_once "element/breadcrumb.php" ?>

<section class="section-b-space">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">

                <?= $xhtmlInfoBook ?>

                <div class="col-sm-3 collection-filter">
                    <?php include_once "element/service.php" ?>
                    <?php include_once "element/special_book.php" ?>
                    <?php include_once "element/new_book.php" ?>

                </div>
            </div>
            <?php include_once "element/relate_book.php" ?>
        </div>
    </div>
</section>

<!-- Quick-view modal popup start-->
<?= FormFrontend::modalViewProduct() ?>
<!-- Quick-view modal popup end-->

<!-- Quick-view modal comment popup start-->
<?= FormFrontend::modalViewComment() ?>
<!-- Quick-view modal comment popup end-->
