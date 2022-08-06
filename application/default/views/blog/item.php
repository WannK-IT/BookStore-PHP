<?php
$item = $this->itemBlog;
$infoBlog = '<h3 class="font-weight-bold text-dark">' . $item['title'] . '</h3>
        <div class="text-muted my-3 pb-3" style="border-bottom: 1px solid #d9d9d9">
            <span>' . date('d/m/Y', strtotime($item['posted_date'])) . '</span>
            <span class="mx-1"> | </span>
            <span>Posted by: ' . $item['posted_by'] . '</span>
        </div>
        <p class="my-2 content-blog">' . $item['content'] . '</p>';

?>

<?php include_once "element/breadcrumb.php" ?>

<section class="section-b-space blog-page ratio2_3">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-9">
                <?= $infoBlog ?>
            </div>
            <div class="col-sm-3">
                <?php require_once "element/blogNewest.php" ?>
                <?php require_once "element/blogRelated.php" ?>
            </div>

        </div>
    </div>
</section>