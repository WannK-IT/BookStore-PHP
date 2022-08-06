<?php 
    $linkSearch = URL::createLink('default', 'blog', 'list', ['search_blog' => $this->arrParam['search_blog'] ?? ''], 'tin-tuc.html');
?>

<div class="row justify-content-center">
    <div class="col-12 col-lg-6">
        <form class="form_search d-block w-100 mb-3" action="<?= $linkSearch ?>" method="POST">
            <input type="hidden" name="module" value="default">
            <input type="hidden" name="controller" value="blog">
            <input type="hidden" name="action" value="list">
            <input id="query search-autocomplete" type="search" name="search_blog" placeholder="Tìm kiếm tin tức..." class="nav-search nav-search-field pl-4 text-dark" aria-expanded="true" value="<?= $this->arrParam['search_blog'] ?? '' ?>" autocomplete="off">
            <button type="submit" class="btn-search">
                <i class="ti-search"></i>
            </button>
        </form>
    </div>
</div>