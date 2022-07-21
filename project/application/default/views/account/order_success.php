<?php include_once "element/breadcrumb.php" ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <p class="my-4"><i class="fa-solid fa-circle-check fa-4x text-success"></i></p>
                <h3 class="my-4 font-weight-bold">Cảm ơn bạn đã mua hàng ở BookStore</h3>
                <h3 class="my-4 font-weight-bold">Sản phẩm sẽ được chuyển đến bạn trong thời gian sớm nhất </h3>
                <h4 class="mt-3 text-muted">Mã đơn hàng: <?= $_GET['order_id'] ?></h4>
                <a href="<?= URL::createLink($this->arrParam['module'], 'home', 'index')?>" class="btn btn-solid mt-3">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>