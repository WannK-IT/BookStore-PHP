<?php
$listBlog       = $this->blogs;
$xhtmlBlog      = '';

if (!empty($listBlog)) {
    $xhtmlBlog          .= '<div class="slide-3 no-arrow">';
    foreach ($listBlog as $itemBlog) {
        $idBlog         = $itemBlog['id'];
        $titleBlogURL   = URL::filterURL($itemBlog['title']);
        $imgBlog        = UPLOAD_BLOG_URL . $itemBlog['picture'];
        $linkItemBlog   = URL::createLink($this->arrParam['module'], 'blog', 'item', ['id' => $idBlog], "tin-tuc/$titleBlogURL-$idBlog");

        $xhtmlBlog .= '<div class="col-md-12">
            <a href="' . $linkItemBlog . '">
                <div class="classic-effect">
                    <div>
                        <img src="' . $imgBlog . '" class="img-fluid blur-up lazyload bg-img" alt="' . $itemBlog['title'] . '">
                    </div>
                    <span></span>
                </div>
            </a>
            <div class="blog-details">
                <a href="' . $linkItemBlog . '">
                    <p>' . $itemBlog['title'] . '</p>
                </a>
            </div>
        </div>';
    }
    $xhtmlBlog      .= '</div>';
}
?>

<!-- Title-->
<div class="title1 section-t-space title5">
    <h2 class="title-inner1">Tin tức</h2>
    <hr role="tournament6">
</div>

<!-- Blog slider -->
<section class="blog p-t-0 ratio2_3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?= $xhtmlBlog ?>
            </div>
        </div>
    </div>
</section>