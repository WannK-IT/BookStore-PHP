$(document).ready(function(){
    // --------- Fade popup
    $("#popup-alert").fadeTo(3000, 500).slideUp(500, function () {
        $("#popup-alert").slideUp(500);
    });

    $('.quantity-box').change(function(){
        let bookID      = $(this).data('id');
        let quantity    = $(this).val();
        let price       = $('#input_price_'+ bookID).val() ;
        if(!Number.isInteger(parseFloat(quantity))){
            toastMsg('error', 'Vui lòng nhập số nguyên !');
        }else{
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'index.php?module=default&controller=account&action=ajaxChangeQty',
                data: {bookID: bookID, qty: quantity, price: price},
                success: function (data) {
                    $('#cart-summary').text(data['summaryQuantity']);
                    $('.total-price-' + data['book_id']).text(formatCurrency(data['totalPriceItem']));
                    $('.total-price-books').text(formatCurrency(data['totalPriceBooks']));
                    $('#input_quantity_' + bookID).val(data['quantity_item']);
                    $('.boxQuantity-' + bookID).notify("Đã thay đổi số lượng", {className: 'success', position:"bottom center", autoHideDelay: 1500});   
                }
            })
        }
        
    });

    $('button#btn-order').click(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Bạn có đồng ý mua sản phẩm ?',
            text: 'Vui lòng kiểm tra thông tin trước khi mua hàng ! Vd: họ tên, số điện thoại, địa chỉ, ...',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#5fcbc4',
            cancelButtonColor: 'bg-secondary',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy bỏ',
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: 'index.php?module=default&controller=account&action=checkExistInfoAccount',
                    success: function (data) {
                        if(data == 'not exist'){
                            Swal.fire({
                                title: 'Bạn vẫn chưa cập nhật đầy đủ thông tin tài khoản ?',
                                text: 'Bạn có muốn quay lại trang tài khoản không ?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#5fcbc4',
                                cancelButtonColor: 'bg-secondary',
                                confirmButtonText: 'Quay về trang tài khoản',
                                cancelButtonText: 'Hủy bỏ',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                   window.location.href = 'tai-khoan.html'
                                }
                            })
                        }else if(data == 'exist'){
                            $('#admin-form-checkout').submit();
                        }
                    }
                })
            }
        })
    })

    // add item to cart
    $('.btn-add-to-cart').click(function(){
        $('#quick-view').modal('hide');
    })

})


// nếu tồn tại class thì thực hiện
if($('a.btn-add-item-cart').length){
    let linkItemCart = $('a.btn-add-item-cart').attr('href');
    $('a.btn-add-item-cart').attr('href', $('a.btn-add-item-cart').attr('href').replace(', quantity', ''));
    $('.btn-qty').click(function(){
        let qty     = $('.input-number').val();
        let link    = linkItemCart.replace('quantity', '\''+qty+'\'');
        $('a.btn-add-item-cart').attr('href', link);
    })
}


function loginForm(link, direct) {
    // Check empty input field
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
        toastMsg('warning', 'Vui lòng nhập thông tin<br>tài khoản !');
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
    let inputNumber = $(".input-number");
    inputNumber.attr('value', '1');
    inputNumber.val('1');
    let price = '';
    $.get(link, function(data){
        console.log(data);
        //  ---------- LOAD INFO BOOK TO MODAL VIEW ----------
        // load img
        $('div.quick-view-img img').attr('src', uploadDir + data['picture'])

        //  -- load name
        $('div.product-right .book-name').html(data['name'])

        //  -- load price
        if(data['sale_off'] != 0){
            price = formatCurrency(data['price']);
        }
        salePrice = data['price'] - ((parseFloat(data['price']) * parseFloat(data['sale_off'])) / 100);
        $('div.product-right .book-price').html(formatCurrency(salePrice) + ' <del>' + price + ' </del>')

        //  -- load description
        $('div.product-right .book-description').html(data['description'])

        //  -- load view info book
        $('.btn-view-book-detail').attr('href', data['link'])

        //  ----------------------------------------------------------------------
        //  -- load quantity by click button minus or plus
        $('button.btn-change-quantity').click(function(){
            var qtyByClick = $('.input-number').val();
            $('.btn-add-to-cart').attr('href', 'javascript:addCart("' + data['id'] + '", "' + salePrice + '", "' + qtyByClick + '")');
        })

        //  -- load quantity by input typing
        $('input.input-number').change(function(){
            var qtyByChange = $('.input-number').val();
            $('.btn-add-to-cart').attr('href', 'javascript:addCart("' + data['id'] + '", "' + salePrice + '", "' + qtyByChange + '")');
        })

        //  -- load quantity default
        $('.btn-add-to-cart').attr('href', 'javascript:addCart("' + data['id'] + '", "' + salePrice + '")');
        
    }, 'json');
    $('#quick-view').modal('show')
}


// Thêm vào giỏ hàng
function addCart(bookID, price, quantity = null){
    let qty = 1;
    if(quantity != null){
        qty = quantity;
    }
    if(!Number.isInteger(parseFloat(qty))){
        toastMsg('error', 'Vui lòng nhập số nguyên !')
    }else{
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'index.php?module=default&controller=account&action=order',
            data: {order_id: bookID, order_price: price, order_qty: qty},
            success: function (data) {
                $('#cart-summary').text(data);
                $('#cart-summary').notify("Đã thêm vào giỏ hàng", {className: 'success', position: "bottom right", autoHideDelay: 2500});
            }
        })
    }
}

function comment(){
    if(!$('textarea#comment_place').val().trim()){
        toastMsg('warning', 'Vui lòng nhập bình luận !');
    }else{
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'index.php?module=default&controller=book&action=comment',
            data: $('#form-comment').serialize(),
            success: function (data) {
                $('div.comment-area').prepend(rowComment(data['fullname'], data['created'], data['comment']));
                $('p.count-comment').text(data['count'] + ' bình luận');
                $('textarea#comment_place').val('');
                toastMsg('success', 'Thêm bình luận thành công');
            }
        })
    }  
}

function loadMoreComment(bookID){
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'index.php?module=default&controller=book&action=loadComment',
        data: {bid: bookID},
        success: function (data) {
            $.each(data, function(index, value){

                $('div.modal-comment-area').append(elementModalComment(value['fullname'], formatDate(value['created']), value['text']))
            })
        }
    })
    $('#view-comment').modal('show');
}


function formatDate(date){
    let dataDate = new Date(date);
    return dataDate.getDate() + '/' + (dataDate.getMonth() + 1) + '/' + dataDate.getFullYear();
}

function formatCurrency(number){
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number)
}

function toastMsg(icon, msg) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
    })
    
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

function rowComment(name, date, comment){
    let xhtml = '';
    xhtml = '<div class="row my-5"><div class="col-sm-2"><p class="text-dark p-0"><strong>' + name + '</strong></p>' + '<p class="text-muted mt-1 p-0" style="font-size: 12px">' + date + '</p>' + '</div><div class="col-sm-10"><p class="p-0">' + comment + '</p></div></div>';
    return xhtml;
}

function elementModalComment(name, date, comment){
    let xhtml = '<div class="row mb-3"><div class="col-sm-2"><p class="text-dark p-0"><strong>'+name+'</strong></p><p class="text-muted mt-1 p-0" style="font-size: 12px">'+date+'</p></div><div class="col-sm-10"><p class="p-0">'+comment+'</p></div></div>';
    return xhtml;
}
  