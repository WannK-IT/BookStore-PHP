<!-- Home slider -->
<?php include_once "element/home_slider.php" ?>
<!-- Home slider end -->

<!-- Top Collection -->
<?php include_once "element/top_collection.php" ?>
<!-- Top Collection end-->

<!-- service layout -->
<?php include_once "element/service_layout.php" ?>
<!-- service layout  end -->

<?php
$xhtmlCategory = $xhtmlBook = '';
$newArrayList = [];

// Lấy danh sách các category special
$listCategory = array_column($this->listSpecial, 'category_name', 'category_id');

// Xử lý lấy các data array gán vào theo từng id category
foreach ($this->listSpecial as $value) {
    if (in_array($value['category_id'], array_flip($listCategory))) {
        $newArrayList[$value['category_id']][] = $value;
    }
}

if (!empty($newArrayList)) {
    $xhtmlCategory .= '<ul class="tabs tab-title">';
    $i = 1;
    foreach ($newArrayList as $keyCategory => $itemCategory) {
        // Danh mục nổi bật
        $activeDefault = ($i == 1) ? 'active default' : '';
        $activeTab = ($i == 1) ? 'class="current"' : '';
        $xhtmlCategory .= '<li ' . $activeTab . '><a href="tab-category-' . $keyCategory . '" class="my-product-tab" data-category="' . $keyCategory . '">' . $itemCategory[0]['category_name'] . '</a></li>';

        // Các sách nổi bật theo từng tab
        $xhtmlBook .= '<div id="tab-category-' . $keyCategory . '" class="tab-content ' . $activeDefault . '">
                            <div class="no-slider row tab-content-inside">';
        $countItemBook = 1;
        foreach ($itemCategory as $keyBook => $valueBook) {

            // Danh sách "sản phẩm nổi bật" chỉ cho phép chứa tối đa 8 item, kiểm tra nếu số item vượt quá 8 sẽ ngắt vòng lặp
            if($countItemBook > 8){
                break;
            }

            $imgBook = UPLOAD_BOOK_URL . $valueBook['picture'];
            $discountPrice  = $valueBook['price'] - (($valueBook['price'] * $valueBook['sale_off']) / 100);
            $hrefModalView  = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'ajaxLoadInfo', ['id' => $valueBook['book_id']]);

            $xhtmlBook .= '<div class="product-box">
                <div class="img-wrapper">
                    <div class="lable-block">
                        <span class="lable4 badge badge-danger"> -' . $valueBook['sale_off'] . '%</span>
                    </div>
                    <div class="front">
                        <a href="item.html">
                            <img src="' . $imgBook . '" class="img-fluid blur-up lazyload bg-img" alt="product">
                        </a>
                    </div>
                    <div class="cart-info cart-wrap">
                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
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
                    <a href="item.html">
                        <h6 class="cs-ellipsis-4 pb-0">' . $valueBook['description'] . '</h6>
                    </a>
                    <h4 class="text-lowercase pt-2">' . number_format($discountPrice, 0, '', ',') . ' đ <del>' . number_format($valueBook['price'], 0, '', ',') . ' đ</del></h4>
                </div>
            </div>';
            $countItemBook++;
        }
        $xhtmlBook .= ' </div>
                        <div class="text-center"><a href="list.html" class="btn btn-solid">Xem tất cả</a></div>
                    </div>';
        $i++;
    }
    $xhtmlCategory .= '</ul>';
} else {
    $xhtmlCategory = '<p class="font-weight-bold text-center h6 text-muted">Danh mục đang được cập nhật !</p>';
}
?>

<!-- Tab product -->
<div class="title1 section-t-space title5">
    <h2 class="title-inner1">Danh mục nổi bật</h2>
    <hr role="tournament6">
</div>

<section class="p-t-0 j-box ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="theme-tab">
                    <?= $xhtmlCategory ?>
                    <div class="tab-content-cls">
                        <!-- <div id="tab-category-33" class="tab-content active default">
                            <div class="no-slider row tab-content-inside">
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= (UPLOAD_URL . 'book/mao-son-troc-quy-nhan83hngfm4.jpg') ?>" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">

                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center"><a href="list.html" class="btn btn-solid">Xem tất cả</a></div>
                        </div>
                        <div id="tab-category-34" class="tab-content ">
                            <div class="no-slider row tab-content-inside">
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center"><a href="list.html" class="btn btn-solid">Xem tất cả</a></div>
                        </div>
                        <div id="tab-category-35" class="tab-content ">
                            <div class="no-slider row tab-content-inside">
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block">
                                            <span class="lable4 badge badge-danger"> -35%</span>
                                        </div>
                                        <div class="front">
                                            <a href="item.html">
                                                <img src="<?= $this->_dirImg ?>product.jpg" class="img-fluid blur-up lazyload bg-img" alt="product">
                                            </a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                            <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>
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
                                        <a href="item.html" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                            <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                quasi ...</h6>
                                        </a>
                                        <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center"><a href="list.html" class="btn btn-solid">Xem tất cả</a></div>
                        </div> -->
                        <?= $xhtmlBook ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

// $newarr = [];
// foreach(array_flip($listCategory) as $key => $value){
//     foreach($this->listBook as $keyTest => $valueTest){
//         if($valueTest['category_id'] == $value){
//             $newarr[$value][] = $valueTest;
//         }
//     }
// }

// echo 'new Array';
// echo '<pre style="color: blue;">';
// print_r($newarr);
// echo '</pre>';
?>
<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <div class="row mr-2">
                    <div class="col-lg-6 col-xs-12 d-flex justify-content-center align-items-center">
                        <div class="quick-view-img"><img src="" alt="" class="w-100 img-fluid blur-up lazyload book-picture"></div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 class="book-name"></h2>
                            <h3 class="book-price">26.910 ₫ <del>39.000 ₫</del></h3>
                            <div class="border-product">
                                <div class="book-description cs-ellipsis-10"></div>
                            </div>
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
                                <a href="#" class="btn btn-solid mb-1 btn-add-to-cart">Chọn Mua</a>
                                <a href="item.html" class="btn btn-solid mb-1 btn-view-book-detail">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->