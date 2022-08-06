<?php
$xhtmlBlogNewest = '';
if (!empty($this->blogsNewest)) {
    foreach ($this->blogsNewest as $itemNewest) {
        $idBNewest          = $itemNewest['id'];
        $titleBNewestURL    = URL::filterURL($itemNewest['title']);
        $urlBNewest         = URL::createLink('default', 'blog', 'item', ['id' => $idBNewest], "tin-tuc/$titleBNewestURL-$idBNewest");
        $imgBNewest         = UPLOAD_BLOG_URL . $itemNewest['picture'];
        $xhtmlBlogNewest    .= '<div class="card border-0" style="max-width: 540px;">
            <a href="' . $urlBNewest . '" class="row g-0">
                <div class="col-md-5 d-flex align-items-center">
                    <img src="' . $imgBNewest . '" class="img-fluid" alt="' . $itemNewest['title'] . '">
                </div>
                <div class="col-md-7 pl-0">
                    <div class="card-body pl-0">
                        <p class="card-text">' . $itemNewest['title'] . '</p>
                    </div>
                </div>
            </a>
        </div>';
    }
} else {
    $xhtmlBlogNewest = '<p class="text-center text-muted font-weight-bold">Đang cập nhật</p>';
}
?>

<div class="col-sm-12 my-4">
    <h4 class="font-weight-bold pb-2" style="border-bottom: 2px solid black;">Bài viết mới nhất</h4>
    <?= $xhtmlBlogNewest ?>
</div>