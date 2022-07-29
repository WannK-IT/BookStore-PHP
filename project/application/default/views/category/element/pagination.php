<?php 
    $xhtmlPagination =  '';
    
if($this->totalItems > 10){
    $xhtmlPagination = '<div class="product-pagination">
    <div class="theme-paggination-block">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <nav aria-label="Page navigation">
                        <nav>'. $this->pagination->showPaginationFrontend(URL::createLink('default', 'category', 'list', null, "danh-muc.html")) .
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

