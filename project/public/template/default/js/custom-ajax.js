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
