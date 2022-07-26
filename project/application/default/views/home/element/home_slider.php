<?php
$sliderHome = '';
$list = array_column($this->listSlider, 'picture');

if (!empty($list)) {
    foreach ($list as $itemSlide) {
        $pictureSlider = UPLOAD_SLIDER_URL . $itemSlide;
        $sliderHome .= '<div>
                    <a class="home text-center">
                        <img src="' . $pictureSlider . '" alt="" class="bg-img blur-up lazyload">
                    </a>
                </div>';
    }
} else {
    $sliderHome = '';
}
?>

<section class="p-0 my-home-slider">
    <div class="slide-1 home-slider">
        <?= $sliderHome ?>
    </div>
</section>