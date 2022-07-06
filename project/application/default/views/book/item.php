<?php
$item = $this->infoItem;
$xhtmlInfoBook = '';
$imgBook = UPLOAD_BOOK_URL . $item['picture'];

// In ra thông tin sách
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
                        <h4><del>' . HelperFrontend::currencyVND($item['price']) . ' đ</del><span> -' . $item['sale_off'] . '%</span></h4>
                        <h3>' . HelperFrontend::currencyVND($item['price_discount']) . ' đ</h3>
                        <div class="product-description border-product">
                            <h6 class="product-title">Số lượng</h6>
                            <div class="qty-box">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-left-minus" data-type="minus" data-field="">
                                            <i class="ti-angle-left"></i>
                                        </button>
                                    </span>
                                    <input type="text" name="quantity" class="form-control input-number" value="1">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-right-plus" data-type="plus" data-field="">
                                            <i class="ti-angle-right"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="product-buttons">
                            <a href="#" class="btn btn-solid ml-0"><i class="fa fa-cart-plus"></i> Chọn mua</a>
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
                        </ul>
                        <div class="tab-content nav-material" id="top-tabContent">
                            <div class="tab-pane fade show active ckeditor-content" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <p><strong>' . $item['name'] . '</strong></p>
                                <p>' . $item['description'] . '</p>
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

<?php include_once "element/phone_contact.php" ?>

<!-- Quick-view modal popup start-->
<?= FormFrontend::modalViewProduct() ?>
<!-- Quick-view modal popup end-->