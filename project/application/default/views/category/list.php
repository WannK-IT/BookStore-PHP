<?php 

$xhtml = '';
$listCategories = $this->categories;
if(!empty($listCategories)){
    $xhtml .= '<div class="no-slider five-product row">';
    foreach($listCategories as $item){
        $img = UPLOAD_CATEGORY_URL . $item['picture'];
        $linkCategory = URL::createLink($this->arrParam['module'], 'book', 'list', ['cid' => $item['id']]);

        $xhtml .= '<div class="product-box">
            <div class="img-wrapper">
                <div class="front">
                    <a href="'.$linkCategory.'"><img src="'.$img.'" class="img-fluid blur-up lazyload bg-img" alt="category-img"></a>
                </div>
            </div>
            <div class="product-detail">
                <a href="'.$linkCategory.'">
                    <h4 class="pt-3">'.$item['name'].'</h4>
                </a>
            </div>
        </div>';
    }
    $xhtml .= '</div>';
}else{
    $xhtml = '<p class="font-weight-bold text-muted text-center">Danh mục sách đang được cập nhật !</p>';
}
?>

<!-- Breadcrumb -->
<?php include_once "element/breadcrumb.php"?>

<!-- List Category -->
<section class="ratio_asos j-box pets-box section-b-space" id="category">
    <div class="container">
        <?= $xhtml ?>

        <!-- Pagination -->
        <?php include_once "element/pagination.php"?>
    </div>
</section>

<!-- Phone contact -->
<?php include_once "element/phone_contact.php"?>