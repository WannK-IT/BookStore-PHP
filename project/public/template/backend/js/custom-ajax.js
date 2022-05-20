$.notify.defaults({
    autoHideDelay: 1500
});

function ajaxStatus(link) {
    $.get(link, function (data) {
        // id       = data[0]
        // status   = data[1]
        // link     = data[2]
        let tagHref = 'a#status-post-' + data[0];
        let classActive = 'bg-gradient-success';
        let classInactive = 'bg-gradient-danger';
        let iconActive = 'fa-check';
        let iconInactive = 'fa-minus';
        if (data[1] == 'active') {
            classActive = 'bg-gradient-danger';
            classInactive = 'bg-gradient-success';
            iconActive = 'fa-minus';
            iconInactive = 'fa-check';
        }
        $(tagHref).attr('href', "javascript:ajaxStatus('" + data[2] + "')");
        $(tagHref).removeClass(classActive).addClass(classInactive);
        $(tagHref + ' i').removeClass(iconActive).addClass(iconInactive);

        $("#status-post-" + data[0]).notify("Cập nhật thành công !", {
            className: 'success',
            position: 'top center'
        });
    }, 'json');
}

function ajaxGroupACP(link) {
    $.get(link, function (data) {
        // id           = data[0]
        // groupACP     = data[1]
        // link         = data[2]
        let tagHref = 'a#groupACP-post-' + data[0];
        let classActive = 'bg-gradient-success';
        let classInactive = 'bg-gradient-danger';
        let iconActive = 'fa-check';
        let iconInactive = 'fa-minus';
        if (data[1] == 'active') {
            classActive = 'bg-gradient-danger';
            classInactive = 'bg-gradient-success';
            iconActive = 'fa-minus';
            iconInactive = 'fa-check';
        }
        $(tagHref).attr('href', "javascript:ajaxGroupACP('" + data[2] + "')");
        $(tagHref).removeClass(classActive).addClass(classInactive);
        $(tagHref + ' i').removeClass(iconActive).addClass(iconInactive);
        $("#groupACP-post-" + data[0]).notify("Cập nhật thành công !", {
            className: 'success',
            position: 'top center'
        });
    }, 'json');
}

function loginForm(link, direct) {
    // Check empty input field
    if (!$('#username').val() || !$('#password').val()) {
        toastMsg('warning', 'Vui lòng nhập tên tài khoản và mật khẩu !');
    } else {
        $.ajax({
            type: 'post',
            url: link,
            data: $('#form-login').serialize(),
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

$(document).ready(function () {
    // Change group user
    $('select[name=select-group]').change(function (e) {
        e.preventDefault();
        let idElement = $(this).data('id');
        let selectedID = $(this).find(':selected').val();
        let link = 'index.php?module=backend&controller=user&action=changeGroupUser&id=' + idElement + '&idSelected=' + selectedID;
        $.get(link, function (data) {
            $('select[data-id=' + idElement + ']').notify("Cập nhật thành công !", {
                className: 'success',
                position: 'top center'
            });
        }, 'json');
        // console.log($(this).attr('data-id'))
    })
})