<?php include_once "element/breadcrumb.php";

$arrForm = [
    [
        'label' => FormFrontend::label('form[old_password]', 'Nhập mật khẩu cũ'),
        'input' => FormFrontend::inputText('password', 'old_password', 'form[old_password]', '')
    ],
    [
        'label' => FormFrontend::label('form[new_password]', 'Nhập mật khẩu mới'),
        'input' => FormFrontend::inputText('password', 'new_password', 'form[new_password]', '')
    ]
];
$formUser   = FormFrontend::showForm($arrForm);
$showErrors = (!empty($this->errors)) ? FormFrontend::showError($this->errors) : '';
?>

<section class="faq-section section-b-space">
    <div class="container">
        <div class="row">

            <?php include_once "element/sidebar.php" ?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <?php
                        if (isset($_SESSION['changePasswordDefault']) && $_SESSION['changePasswordDefault'] == true) {
                            echo HelperFrontend::showAlert('success', 'Đổi mật khẩu thành công !');
                            unset($_SESSION['changePasswordDefault']);
                        }
                        ?>
                        <?= $showErrors ?>
                        <form action="" method="post" id="changePassword-form" class="theme-form">

                            <?= $formUser ?>

                            <input type="hidden" id="form[token]" name="form[token]" value="1657168644">
                            <input type="submit" id="chgPass" value="Đổi mật khẩu" class="btn btn-solid btn-sm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>