$(document).ready(function(){
    $('.quantity-box').change(function(){
        let bookID      = $(this).data('id');
        let quantity    = $(this).val();
        let price       = $('#input_price_'+ bookID).val() ;
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'index.php?module=default&controller=account&action=ajaxChangeQty',
            data: {bookID: bookID, qty: quantity, price: price},
            success: function (data) {
                console.log(data);
                $('#cart-summary').text(data['summaryQuantity']);
                $('.total-price-' + data['book_id']).text(formatCurrency(data['totalPriceItem']));
                $('.total-price-books').text(formatCurrency(data['totalPriceBooks']));
                $('#input_quantity_' + bookID).val(data['quantity_item']);
                $('.boxQuantity-' + bookID).notify("Đã thay đổi số lượng", {className: 'success', position:"bottom center", autoHideDelay: 1500});   
            }
        })
    });
})

function loginForm(link, direct) {
    // Check empty input field
    console.log(link);
    if (!$('#username').val() || !$('#password').val()) {
        toastMsg('warning', 'Vui lòng nhập tên tài khoản và mật khẩu !');
    } else {
        $.ajax({
            type: 'post',
            url: link,
            data: $('#admin-form').serialize(),
            success: function (data) {
                if (data == 'failed') {
                    toastMsg('error', 'Tên tài khoản và mật khẩu chưa chính xác !');
                    console.log(data);
                } else {
                    location.href = direct;
                }
            }
        })

    }
}

function registerForm(link, direct) {
    // Check empty input field
    if (!$('#username').val() || !$('#password').val() || !$('#fullname').val() || !$('#email').val()) {
        toastMsg('warning', 'Vui lòng nhập thông tin tài khoản !');
    } else {
        let checkExist = 'index.php?module=default&controller=account&action=checkExist';
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: checkExist,
            data: $('#admin-form-register').serialize(),
            success: function (data) {
                if(data == 'exist'){
                    toastMsg('warning', 'Tên tài khoản đã được<br>sử dụng !');
                }else{
                    $.post(link, $('#admin-form-register').serialize());
                    window.location.href = direct;
                }
            }
        })

    }
}


// Load modal info book
function loadModal(link, uploadDir){
    let price = '';
    $.get(link, function(data){

        // load img
        $('div.quick-view-img img').attr('src', uploadDir + data['picture'])

        // load name
        $('div.product-right .book-name').html(data['name'])

        // load price
        if(data['sale_off'] != 0){
            price = formatCurrency(data['price']);
        }
        salePrice = data['price'] - ((parseFloat(data['price']) * parseFloat(data['sale_off'])) / 100);
        $('div.product-right .book-price').html(formatCurrency(salePrice) + ' <del>' + price + ' </del>')

        // load description
        $('div.product-right .book-description').html(data['description'])

        // load view info book
        $('.btn-view-book-detail').attr('href', 'index.php?module=default&controller=book&action=item&bid=' + data['id'])

    }, 'json');
    $('#quick-view').modal('show')
}

// Thêm vào giỏ hàng
function addCart(bookID, price){
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'index.php?module=default&controller=account&action=order',
        data: {order_id: bookID, order_price: price},
        success: function (data) {
            $('#cart-summary').text(data);
            $('#cart-summary').notify("Đã thêm vào giỏ hàng", {className: 'success', position:"bottom right", autoHideDelay: 2500});
        }
    })
}


function formatCurrency(number){
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number)
}

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
})

function toastMsg(icon, msg) {
    return Toast.fire({
        icon: icon,
        title: msg
    })
}


function toastMsg2(icon, msg) {
    
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 2500,
    })

    return Toast.fire({
        icon: icon,
        title: msg
    })
}
