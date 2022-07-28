<?php 
$xhtmlPagination = $link = '';

$catID      = $this->arrParam['cid'] ?? '';
$urlCurrent = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME);
$splitCat   = explode('-', $urlCurrent);
array_pop($splitCat);
$catName    = implode('-', $splitCat);

if(isset($this->arrParam['cid'])){
    
    $link = $this->pagination->showPaginationFrontend(URL::createLink('default', 'book', 'list', ['cid' => $catID ?? '', 'sort' => $this->arrParam['sort'] ?? '', 'search' => $this->arrParam['search'] ?? ''], "$catName-$catID.html"));
}else{
    $link = $this->pagination->showPaginationFrontend(URL::createLink('default', 'book', 'list', ['sort' => $this->arrParam['sort'] ?? '', 'search' => $this->arrParam['search'] ?? ''], "sach.html"));
}


if($this->totalItems > 12){
    $xhtmlPagination = '<div class="product-pagination">
    <div class="theme-paggination-block">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <nav aria-label="Page navigation">
                        <nav>'. $link .
                        '</nav>
                    </nav>
                </div>
                <!-- <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="product-search-count-bottom">
                        <h5>Showing Items 1-12 of 55 Result</h5>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>';
}

echo $xhtmlPagination;
?>

