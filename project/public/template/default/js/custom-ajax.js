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
                console.log(data);
            }
        })

    }
}

// Load modal info book
function loadModal(link, uploadDir){
    $.get(link, function(data){
        // load img
        $('div.quick-view-img img').attr('src', uploadDir + data['picture'])

        // load name
        $('div.product-right .book-name').html(data['name'])

        // load price
        salePrice = data['price'] - ((parseFloat(data['price']) * parseFloat(data['sale_off'])) / 100);
        $('div.product-right .book-price').html(formatCurrency(salePrice) + ' <del>' + formatCurrency(data['price']) + ' </del>')

        // load description
        $('div.product-right .book-description').html(data['description'])

        // load view info book
        $('.btn-view-book-detail').attr('href', 'index.php?module=default&controller=book&action=item&bid=' + data['id'])

    }, 'json');
    $('#quick-view').modal('show')
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
