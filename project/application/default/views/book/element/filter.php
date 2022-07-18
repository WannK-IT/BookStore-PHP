<div class="product-top-filter">
    <div class="row">
        <div class="col-xl-12">
            <div class="filter-main-btn">
                <span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="product-filter-content">
                <div class="collection-view">
                    <ul>
                        <li><i class="fa fa-th grid-layout-view"></i></li>
                        <li><i class="fa fa-list-ul list-layout-view"></i></li>
                    </ul>
                </div>
                <div class="collection-grid-view">
                    <ul>
                        <li class="my-layout-view" data-number="2">
                            <img src="<?= $this->_dirImg ?>icon/2.png" alt="" class="product-2-layout-view">
                        </li>
                        <li class="my-layout-view" data-number="3">
                            <img src="<?= $this->_dirImg ?>icon/3.png" alt="" class="product-3-layout-view">
                        </li>
                        <li class="my-layout-view active" data-number="4">
                            <img src="<?= $this->_dirImg ?>icon/4.png" alt="" class="product-4-layout-view">
                        </li>
                        <li class="my-layout-view" data-number="6">
                            <img src="<?= $this->_dirImg ?>icon/6.png" alt="" class="product-6-layout-view">
                        </li>
                    </ul>
                </div>
                <div class="product-page-filter">
                    <form action="" id="sort-form" method="GET" class="d-flex align-items-center">
                        <input type="hidden" name="module" value="<?= $this->arrParam['module'] ?>">
                        <input type="hidden" name="controller" value="<?= $this->arrParam['controller'] ?>">
                        <input type="hidden" name="action" value="<?= $this->arrParam['action'] ?>">
                        <?php
                        if (!empty($this->arrParam['cid'])) {
                            echo '<input type="hidden" name="cid" value="' . $this->arrParam['cid'] . '">';
                        }
                        ?>
                        <?= FormFrontend::selectBox(['default' => '- Sắp xếp -', 'price_asc' => 'Giá tăng dần', 'price_desc' => 'Giá giảm dần', 'latest' => 'Mới nhất'], 'sort', 'sort', $this->arrParam['sort'] ?? 'default') ?>
                        <span style="margin-left: -30px;"><i class="fa fa-caret-down fa-2x text-secondary" aria-hidden="true"></i></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>