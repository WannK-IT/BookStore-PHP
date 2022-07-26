<div class="breadcrumb-section">
    <div class="container">
        <div class="d-flex justify-content-between mx-1">
            <div class="page-title">
                <h2 class="py-2"> <?= $this->breadcrumb ?> </h2>
            </div>
            <?php
            $xhtmlDelCart          = '';
            $urlDelCart            = 'index.php?' . $_SERVER['QUERY_STRING'];
            $linkDelCart = URL::createLink('default', 'account', 'removeItemCart', ['task' => 'cart']);
            if ($urlDelCart == URL::createLink('default', 'account', 'cart') && !empty($_SESSION['cart']['quantity'])) {
                $xhtmlDelCart = '<div class="page-title">
                                <a href="' . $linkDelCart . '" class="btn btn-danger rounded text-white">Xóa giỏ hàng</a>
                            </div>';
            } else {
                $xhtmlDelCart = '';
            }
            echo $xhtmlDelCart;
            ?>

        </div>
    </div>
</div>