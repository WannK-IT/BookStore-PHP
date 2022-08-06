<?php
$xhtmlBlogRelated = '';
if (!empty($this->blogsRelated)) {
    foreach ($this->blogsRelated as $itemRelated) {
        $idBRelated         = $itemRelated['id'];
        $titleBRelatedURL   = URL::filterURL($itemRelated['title']);
        $urlBRelated        = URL::createLink('default', 'blog', 'item', ['id' => $idBRelated], "tin-tuc/$titleBRelatedURL-$idBRelated");
        $imgBRelated        = UPLOAD_BLOG_URL . $itemRelated['picture'];
        $xhtmlBlogRelated .= '<div class="card border-0" style="max-width: 540px;">
            <a href="' . $urlBRelated . '" class="row g-0">
                <div class="col-md-5 d-flex align-items-center">
                    <img src="' . $imgBRelated . '" class="img-fluid" alt="' . $itemRelated['title'] . '">
                </div>
                <div class="col-md-7 pl-0">
                    <div class="card-body pl-0">
                        <p class="card-text">' . $itemRelated['title'] . '</p>
                    </div>
                </div>
            </a>
        </div>';
    }
} else {
    $xhtmlBlogRelated = '<p class="text-center text-muted font-weight-bold">Đang cập nhật</p>';
}
?>

<div class="col-sm-12 my-5">
    <h4 class="font-weight-bold pb-2" style="border-bottom: 2px solid black;">Có thể bạn quan tâm</h4>
    <?= $xhtmlBlogRelated ?>
</div>