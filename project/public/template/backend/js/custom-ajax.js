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

function ajaxIsHome(link) {
    $.get(link, function (data) {
        // id       = data[0]
        // status   = data[1]
        // link     = data[2]
        let tagHref = 'a#isHome-post-' + data[0];
        let classActive = 'bg-gradient-success';
        let classInactive = 'bg-gradient-danger';
        let iconActive = 'fa-check';
        let iconInactive = 'fa-minus';
        if (data[1] == 'yes') {
            classActive = 'bg-gradient-danger';
            classInactive = 'bg-gradient-success';
            iconActive = 'fa-minus';
            iconInactive = 'fa-check';
        }
        $(tagHref).attr('href', "javascript:ajaxIsHome('" + data[2] + "')");
        $(tagHref).removeClass(classActive).addClass(classInactive);
        $(tagHref + ' i').removeClass(iconActive).addClass(iconInactive);

        $("#isHome-post-" + data[0]).notify("Cập nhật thành công !", {
            className: 'success',
            position: 'top center'
        });
    }, 'json');
}


function ajaxSpecial(link) {
    $.get(link, function (data) {
        // id       = data[0]
        // special   = data[1]
        // link     = data[2]
        let tagHref = 'a#special-post-' + data[0];
        let classActive = 'bg-gradient-success';
        let classInactive = 'bg-gradient-danger';
        let iconActive = 'fa-check';
        let iconInactive = 'fa-minus';
        if (data[1] == 'yes') {
            classActive = 'bg-gradient-danger';
            classInactive = 'bg-gradient-success';
            iconActive = 'fa-minus';
            iconInactive = 'fa-check';
        }
        $(tagHref).attr('href', "javascript:ajaxSpecial('" + data[2] + "')");
        $(tagHref).removeClass(classActive).addClass(classInactive);
        $(tagHref + ' i').removeClass(iconActive).addClass(iconInactive);

        $("#special-post-" + data[0]).notify("Cập nhật thành công !", {
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
                } else if(data == 'notPermission'){
                    toastMsg('error', 'Bạn không có quyền truy cập');
                } else if(data == 'success') {
                    location.href = direct;
                }
            }
        })

    }
}


// =========================== READY JQUERY ===========================
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
    })

    // Change group category
    $('select[name=select-category]').change(function (e) {
        e.preventDefault();
        let idElement = $(this).data('id');
        let selectedID = $(this).find(':selected').val();
        let link = 'index.php?module=backend&controller=book&action=changeGroupCategory&id=' + idElement + '&idSelected=' + selectedID;
        $.get(link, function (data) {
            $('select[data-id=' + idElement + ']').notify("Cập nhật thành công !", {
                className: 'success',
                position: 'top center'
            });
        }, 'json');
    })


    // change ordering category
    $('.chkOrderingCategory').change(function (e) {
        if ($(this).val() < 1) {
            e.preventDefault();
            toastMsg('warning', 'Giá trị Ordering thấp nhất là 1');
        } else {
            $(this).notify("Cập nhật thành công !", {
                className: 'success',
                position: 'top center'
            });
            let id = $(this).data('id');
            let value = $(this).val();
            let link = 'index.php?module=backend&controller=category&action=changeOrdering&newValue=' + value + '&id=' + id;
            $.get(link, function (data) {
            });
        }
    })

    // change ordering book
    $('.chkOrderingBook').change(function (e) {
        if ($(this).val() < 1) {
            e.preventDefault();
            toastMsg('warning', 'Giá trị Ordering thấp nhất là 1');
        } else {
            $(this).notify("Cập nhật thành công !", {
                className: 'success',
                position: 'top center'
            });
            let id = $(this).data('id');
            let value = $(this).val();
            let link = 'index.php?module=backend&controller=book&action=changeOrdering&newValue=' + value + '&id=' + id;
            $.get(link, function (data) {
            });
        }
    })

    //change status order in cart
    $('select[name=status_order]').change(function (e) {
        e.preventDefault();
        let idElement = $(this).data('id');
        let valueSelected = $(this).find(':selected').val();
        let link = 'index.php?module=backend&controller=cart&action=changeStatusOrder&id=' + idElement + '&valueSelected=' + valueSelected;
        $.get(link, function (data) {
            let element = $('select[data-id=' + data['id'] + ']');
            if(data['value'] == 'inactive'){
                element.addClass('bg-warning').removeClass('bg-success');
            }else{
                element.addClass('bg-success').removeClass('bg-warning');
            }
            element.notify("Cập nhật thành công !", {
                className: 'success',
                position: 'top center'
            });
        }, 'json');
    })
})

