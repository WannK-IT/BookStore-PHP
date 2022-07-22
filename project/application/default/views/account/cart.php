<?php include_once "element/breadcrumb.php" ?>

<section class="cart-section section-b-space">
    <form action="<?= URL::createLink($this->arrParam['module'], 'account', 'buy') ?>" method="POST" name="admin-form" id="admin-form-checkout">
        <div class="container">

            <?php
            $itemCart = '';
            $summary = 0;
            if (!empty($this->itemsCart)) {
            ?>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table cart-table table-responsive-xs">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sách</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col"></th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($this->itemsCart as $value) {
                                    $imgBook        = UPLOAD_BOOK_URL . $value['picture'];
                                    $linkBook       = URL::createLink($this->arrParam['module'], 'book', 'item', ['bid' => $value['id']]);
                                    $linkRemoveItem = URL::createLink($this->arrParam['module'], 'account', 'removeItemCart', ['item_id' => $value['id']]);
                                    $price          = HelperFrontend::currencyVND($value['price']);
                                    $totalPrice     = HelperFrontend::currencyVND($value['totalPrice']);
                                    $summary    += $value['totalPrice'];
                                    $itemCart .= '<tr>
                                        <td>
                                            <a href="' . $linkBook . '"><img src="' . $imgBook . '" alt="' . $value['name'] . '"></a>
                                        </td>
                                        <td>
                                            <a href="' . $linkBook . '">' . $value['name'] . '</a>
                                            <div class="mobile-cart-content row">
                                                <div class="col-xs-3">
                                                    <div class="qty-box">
                                                        <div class="input-group boxQuantity-' . $value['id'] . '">
                                                            <input type="number" name="quantity" value="' . $value['quantity'] . '" class="form-control input-number quantity-box" data-id="' . $value['id'] . '" min="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <h2 class="td-color text-lowercase">' . $price . ' &#8363;</h2>
                                                </div>
                                                <div class="col-xs-3">
                                                    <h2 class="td-color text-lowercase">
                                                        <a href="' . $linkRemoveItem . '" class="icon"><i class="fa-solid fa-circle-xmark fa-lg text-danger"></i></a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h2 class="text-lowercase">' . $price . ' &#8363;</h2>
                                        </td>
                                        <td>
                                            <div class="qty-box">
                                                <div class="input-group boxQuantity-' . $value['id'] . '">
                                                    <input type="number" name="quantity" value="' . $value['quantity'] . '" class="form-control input-number quantity-box" data-id="' . $value['id'] . '" min="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="' . $linkRemoveItem . '" class="icon"><i class="fa-solid fa-circle-xmark fa-lg text-danger"></i></a></td>
                                        <td>
                                            <h2 class="td-color text-lowercase total-price-' . $value['id'] . '">' . $totalPrice . ' &#8363;</h2>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="form[book_id][]" value="' . $value['id'] . '" id="input_book_id_' . $value['id'] . '">
                                    <input type="hidden" name="form[price][]" value="' . $value['price'] . '" id="input_price_' . $value['id'] . '">
                                    <input type="hidden" name="form[quantity][]" value="' . $value['quantity'] . '" id="input_quantity_' . $value['id'] . '">
                                    <input type="hidden" name="form[name][]" value="' . $value['name'] . '" id="input_name_' . $value['id'] . '">
                                    <input type="hidden" name="form[picture][]" value="' . $value['picture'] . '" id="input_picture_' . $value['id'] . '">';
                                }
                                echo $itemCart;
                                ?>
                            </tbody>

                        </table>
                        <table class="table cart-table table-responsive-md">
                            <tfoot>
                                <tr>
                                    <td>Tổng :</td>
                                    <td>
                                        <h2 class="text-lowercase total-price-books"><?= HelperFrontend::currencyVND($summary) ?> &#8363;</h2>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row cart-buttons">
                    <div class="col-6"><a href="<?= URL::createLink($this->arrParam['module'], 'book', 'list') ?>" class="btn btn-solid">Tiếp tục mua sắm</a></div>
                    <div class="col-6"><button type="button" id="btn-order" class="btn btn-solid">Đặt hàng</button></div>
                </div>
            <?php
            } else {
                echo '<div class="text-center">
                        <i class="fa-solid fa-cart-plus fa-4x" style="color: #5fcbc4"></i>
                        <p class="my-4 h5 text-muted font-weight-bold">Chưa có sản phẩm nào trong giỏ hàng</p>
                        <a href="' . URL::createLink($this->arrParam['module'], 'book', 'list') . '" class="btn btn-solid">Tiếp tục mua sắm</a>
                    </div>';
            } ?>

        </div>
    </form>
</section>
