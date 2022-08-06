<?php
$catFooter = $policyFooter = '';
$model              = new Model();

$queryCatFooter[]   = "SELECT `id`, `name` FROM `" . DB_TBL_CATEGORY . "`";
$queryCatFooter[]   = "WHERE `status` = 'active' AND `isShowHome` = 'yes'";
$queryCatFooter[]   = "ORDER BY `ordering` LIMIT 4";
$queryCatFooter     = implode(' ', $queryCatFooter);
$resultCatFooter    = $model->listRecord($queryCatFooter);

$queryPolicy[]      = "SELECT `id`, `title` FROM `blog`";
$queryPolicy[]      = "WHERE `status` = 'active' AND `ordering` = '1'";
$queryPolicy        = implode(' ', $queryPolicy);
$resultPolicy       = $model->listRecord($queryPolicy);

if (!empty($resultCatFooter)) {
    foreach ($resultCatFooter as $value) {
        $idCatFooter    = $value['id'];
        $nameCatFooter  = URL::filterURL($value['name']);
        $linkViewFooter = URL::createLink('default', 'book', 'list', ['cid' => $idCatFooter], "$nameCatFooter-$idCatFooter.html");
        $catFooter      .= '<li><a href="' . $linkViewFooter . '">' . $value['name'] . '</a></li>';
    }
}

if (!empty($resultPolicy)) {
    $policyFooter .= '<ul>';
    foreach ($resultPolicy as $valuePolicy) {
        $idPolicy       = $valuePolicy['id'];
        $titlePolicy    = $valuePolicy['title'];
        $titlePolicyURL = URL::filterURL($valuePolicy['title']);
        $linkPolicy     = URL::createLink('default', 'blog', 'item', ['id' => $idPolicy], "tin-tuc/$titlePolicyURL-$idPolicy");
        $policyFooter .= '<li><a href="' . $linkPolicy . '">' . $titlePolicy . '</a></li>';
    }
    $policyFooter .= '</ul>';
}
?>

<div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon">
    <div class="phonering-alo-ph-circle" style="z-index: 1;"></div>
    <div class="phonering-alo-ph-circle-fill" style="z-index: 1;"></div>
    <a href="tel:0356809728" class="pps-btn-img" title="Liên hệ">
        <div class="phonering-alo-ph-img-circle" style="z-index: 1;"></div>
    </a>
</div>
<footer class="footer-light mt-5">
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>Giới thiệu</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo">
                            <h2 style="color: #5fcbc4">BookStore</h2>
                        </div>
                        <p>Tự hào là một trong những website bán sách trực tuyến lớn nhất Việt Nam, cung cấp đầy đủ các thể loại
                            sách, đặc biệt với những đầu sách độc quyền trong nước và quốc tế.</p>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Danh mục nổi bật</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <?= $catFooter ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Chính sách</h4>
                        </div>
                        <div class="footer-contant">
                            <?= $policyFooter ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Thông tin</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-phone"></i>Hotline : <a href="tel:0383308983">0356809728</a></li>
                                <li><i class="fa fa-envelope-o"></i>Email: <a href="mailto:n.nquanght@gmail.com" class="text-lowercase">n.nquanght@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2022 <a href="https://www.facebook.com/darkelixir.cocq/">Quang Nguyen</a>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>