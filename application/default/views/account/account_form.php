<?php

$arrForm = [
    [
        'label' => FormFrontend::label('form[username]', 'Username'),
        'input' => FormFrontend::inputText('text', 'username', 'form[username]', $this->infoAccount['username'], true)
    ],
    [
        'label' => FormFrontend::label('form[email]', 'Email'),
        'input' => FormFrontend::inputText('email', 'email', 'form[email]', $this->infoAccount['email'], true)
    ],
    [
        'label' => FormFrontend::label('form[fullname]', 'Họ tên'),
        'input' => FormFrontend::inputText('text', 'fullname', 'form[fullname]', $this->infoAccount['fullname'], true)
    ],
    [
        'label' => FormFrontend::label('form[phone]', 'Số điện thoại'),
        'input' => FormFrontend::inputText('number', 'phone', 'form[phone]', @$this->infoAccount['phone'])
    ],
    [
        'label' => FormFrontend::label('form[address]', 'Địa chỉ'),
        'input' => FormFrontend::inputText('text', 'address', 'form[address]', @$this->infoAccount['address'])
    ],
];
$formUser   = FormFrontend::showForm($arrForm);
$showErrors = (!empty($this->errors)) ? FormFrontend::showError($this->errors) : '';
?>

<?php include_once "element/breadcrumb.php" ?>

<section class="faq-section section-b-space">
    <div class="container">
        <div class="row">

            <?php include_once "element/sidebar.php" ?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">

                        <?php
                        if (isset($_SESSION['updateInfoUser']) && $_SESSION['updateInfoUser'] == true) {
                            echo HelperFrontend::showAlert('success', 'Cập nhật thông tin tài khoản thành công !');
                            unset($_SESSION['updateInfoUser']);
                        }
                        ?>
                        <?= $showErrors ?>
                        <form action="" method="post" id="user-form" class="theme-form">
                            <?= $formUser ?>
                            <input type="hidden" id="form[token]" name="form[token]" value="1599258345">
                            <input type="submit" class="btn btn-solid btn-sm" value="Cập nhật thông tin">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
