<div class="product-pagination">
    <div class="theme-paggination-block">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <nav aria-label="Page navigation">
                        <nav>
                        <?= $this->pagination->showPaginationFrontend(URL::createLink($this->arrParam['module'], $this->arrParam['controller'], $this->arrParam['action'], ['cid' => @$this->arrParam['cid'], 'sort' => @$this->arrParam['sort']]));
                        
                        echo '<pre style="color: blue;">';
                        print_r($this->pagination);
                        echo '</pre>';?>
                            <!-- <ul class="pagination">
                                <li class="page-item disabled">
                                    <a href="" class="page-link"><i class="fa fa-angle-double-left"></i></a>
                                </li>
                                <li class="page-item disabled">
                                    <a href="" class="page-link"><i class="fa fa-angle-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-double-right"></i></a>
                                </li>
                            </ul> -->
                        </nav>
                    </nav>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="product-search-count-bottom">
                        <h5>Showing Items 1-12 of 55 Result</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-double-left"></i></a></li>
        <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-left"></i></a></li>
        <li class="page-item active"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
    </ul> -->