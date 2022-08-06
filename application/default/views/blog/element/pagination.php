<?php
$xhtmlPagination =  '';

if ($this->totalItems > 6) {
    $xhtmlPagination = '<div class="product-pagination ml-4">
    <div class="theme-paggination-block">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <nav aria-label="Page navigation">
                        <nav>' . $this->pagination->showPaginationFrontend(URL::createLink('default', 'blog', 'list', ['search_blog' => $this->arrParam['search_blog'] ?? ''], 'tin-tuc.html')) . '</nav>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>';
}

echo $xhtmlPagination;
