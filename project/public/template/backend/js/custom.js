$(document).ready(function () {

    // Bulk apply button
    $("#bulk-apply").click(function (e) {
        let url = $(this).attr("data-url");
        let optionSelected = $('#bulk-action').find('option:selected').attr('value');
        if (optionSelected == '') {
            toastMsg('warning', 'Vui lòng chọn một action !')
        } else {
            let checked = $("#form-table input:checked").length > 0;
            if (!checked) {
                toastMsg('warning', 'Vui lòng chọn ít nhất một trường dữ liệu !')
            } else {
                url = url.replace("value_new", optionSelected);
                deleteChecked = url.split('&')[2].split("=")[1];
                if (deleteChecked == 'delete') {
                    Swal.fire({
                        title: 'Bạn có chắc chắn ?',
                        text: "Các dữ liệu này của bạn sẽ không thể khôi phục",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy bỏ',
                        focusCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#form-table").attr("action", url);
                            $("#form-table").submit();
                        }
                    })
                } else {
                    $("#form-table").attr("action", url);
                    $("#form-table").submit();
                }
            }
        }
    });

    // Check all
    $("#check-all").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    // Submit form search
    $("#btn-search").click(function (e) {
        e.preventDefault();
        if (!$('#search_form').val()) {
            toastMsg('warning', 'Vui lòng nhập từ khóa tìm kiếm !')
        } else {
            $("#form-search").submit();
        }

    });

    // Filter group acp
    $('#filter_group_acp').change(function (e) {
        $("#form_group_acp").submit();
    });

    // Filter group user
    $('#filter_group').change(function (e) {
        $("#form_group").submit();
    });

    // Filter category
    $('#filter_category').change(function (e) {
        $("#form_category").submit();
    });

    // Filter special
    $('#filter_special').change(function (e) {
        $("#form_special").submit();
    });

    // Filter show homepage
    $('#filter_homepage').change(function (e) {
        $("#form_showhome").submit();
    });

    // fade popup
    $("#add-success").fadeTo(3000, 500).slideUp(500, function () {
        $("#add-success").slideUp(500);
    });

    // Sweetalert2 Button Delete
    $('.btn-delete').click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Bạn có chắc chắn?',
            text: "Dữ liệu sẽ không thể phục hồi sau khi xóa !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $(this).attr('href');
            }
        })
    });

    // Generate random string
    function randomString(){
        return (Math.random().toString(36).substring(2, 12));
    }

    $('#generateString').val(randomString()); //aut

    $('.btn-generate-password').click(function () {
        $('#generateString').val(randomString());
    });

    $('#changePassWord').click(function (e) {
        if (!$('#generateString').val()) {
            e.preventDefault();
            toastMsg('warning', 'Vui lòng tạo mật khẩu ngẫu nhiên !')
        }
    });

});

function modalImg(linkPicture){
    $('.view-img-admin img').attr('src', linkPicture);
    $('#view-img-admin').modal('show');
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