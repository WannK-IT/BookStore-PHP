$(document).ready(function () {
    // activeMenu();
    $('.slide-5').on('setPosition', function () {
        $(this).find('.slick-slide').height('auto');
        var slickTrack = $(this).find('.slick-track');
        var slickTrackHeight = $(slickTrack).height();
        $(this)
            .find('.slick-slide')
            .css('height', slickTrackHeight + 'px');
        $(this)
            .find('.slick-slide > div')
            .css('height', slickTrackHeight + 'px');
        $(this)
            .find('.slick-slide .category-wrapper')
            .css('height', slickTrackHeight + 'px');
    });

    $('.breadcrumb-section').css('margin-top', $('.my-header').height() + 'px');
    $('.my-home-slider').css('margin-top', $('.my-header').height() + 'px');

    $(window).resize(function () {
        let height = $('.my-header').height();
        $('.breadcrumb-section').css('margin-top', height + 'px');
        $('.my-home-slider').css('margin-top', height + 'px');
    });

    // show more show less
    if ($('.category-item').length > 10) {
        $('.category-item:gt(9)').hide();
        $('#btn-view-more').show();
    }

    $('#btn-view-more').on('click', function () {
        $('.category-item:gt(9)').toggle();
        $(this).text() === 'Xem thêm' ? $(this).text('Thu gọn') : $(this).text('Xem thêm');
    });


    // grid-view fetch layout
    if(localStorage.getItem("layoutViewNumber") != null){
        $('li.my-layout-view').removeClass('active');
        $('[data-number="' + localStorage.getItem("layoutViewNumber") + '"]').addClass('active');
        let numberCol = 12/parseInt(localStorage.getItem("layoutViewNumber"))
        $(".product-wrapper-grid").children().children().removeClass();
        $(".product-wrapper-grid").children().children().addClass("col-lg-" + numberCol);
    }
    else{
        localStorage.setItem("layoutViewNumber", 4);
        $('li.my-layout-view[data-number="' + localStorage.getItem("layoutViewNumber") + '"]').addClass('active');
    }
  
    // set layout book by level
    $('li.my-layout-view > img').click(function () {
        $('li.my-layout-view').removeClass('active');
        localStorage.setItem("layoutViewNumber", $(this).parent().data('number'));
        $(this).parent().addClass('active');
    });

    $('#sort-form select[name="sort"]').change(function () {
        if (getUrlParam('filter_price')) {
            $('#sort-form').append(
                '<input type="hidden" name="filter_price" value="' +
                    getUrlParam('filter_price') +
                    '">'
            );
        }

        if (getUrlParam('search')) {
            $('#sort-form').append(
                '<input type="hidden" name="search" value="' +
                    getUrlParam('search') +
                    '">'
            );
        }

        $('#sort-form').submit();
    });


    setTimeout(function () {
        $('#frontend-message').toggle('slow');
    }, 4000);


    
});

function activeMenu() {
    // let controller = getUrlParam('controller') == null ? 'index' : getUrlParam('controller');
    // let action = getUrlParam('action') == null ? 'index' : getUrlParam('action');
    let dataActive = controller + '-' + action;
    $(`a[data-active=${dataActive}]`).addClass('my-menu-link active');
}

function getUrlParam(key) {
    let searchParams = new URLSearchParams(window.location.search);
    return searchParams.get(key);
}
