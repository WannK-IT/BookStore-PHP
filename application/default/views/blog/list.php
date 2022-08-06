<?php
// "$categorySpecialNameURL/$bookSpecialNameURL-$idBookSpecial.html"
$xhtmlListBlog = '';
if (!empty($this->blogs)) {
    foreach ($this->blogs as $itemBlog) {
        $idItem         = $itemBlog['id'];
        $title          = HelperFrontend::highlightSearch($this->arrParam['search_blog'] ?? '', $itemBlog['title']);
        $imgBlog        = UPLOAD_BLOG_URL . $itemBlog['picture'];
        $dateBlog       = date('d/m/Y', strtotime($itemBlog['posted_date']));
        $postedByBlog   = $itemBlog['posted_by'];
        $description    = strip_tags($itemBlog['content']);
        $titleURL       = URL::filterURL($title);
        $linkBlog       = URL::createLink('default', 'blog', 'item', ['id' => $idItem], "tin-tuc/$titleURL-$idItem");
        $xhtmlListBlog .= '<div class="col-sm-6 my-4">
            <div class="card shadow">
                <a href="' . $linkBlog . '" class="bg-size blur-up lazyloaded" style="background-size: cover; background-position: center center; display: block;">
                    <img src="' . $imgBlog . '" class="img-fluid blur-up lazyload bg-img" alt="' . $title . '">
                </a>
                <div class="card-body">
                    <p class="card-text">
                        <span>' . $dateBlog . '</span><span class="mx-2">|</span><i class="fas fa-user fa-sm"></i>
                        <span>' . $postedByBlog . '</span>
                    </p>
                    <a href="' . $linkBlog . '" class="text-dark"><h4 style="line-height: 1.5; min-height:60px" class="card-title font-weight-bold cs-ellipsis-2">' . $title . '</h4></a>
                    <p class="cs-ellipsis-3">' . $description . '</p>

                </div>

            </div>
        </div>';
    }
} else {
    $xhtmlListBlog = '<p class="text-center text-muted font-weight-bold">Đang cập nhật</p>';
}

?>

<!-- Breadcrumb -->
<?php include_once "element/breadcrumb.php" ?>

<section class="section-b-space blog-page ratio2_3">
    <div class="container">
        <?php require_once "element/search.php" ?>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-9">
                <div class="row mx-4">
                    <?= $xhtmlListBlog ?>
                </div>
                <?php require_once "element/pagination.php" ?>
            </div>

            <div class="col-sm-3">
                <?php require_once "element/blogNewest.php"?>
                <?php require_once "element/blogRelated.php"?>    
            </div>
        </div>
    </div>
</section>