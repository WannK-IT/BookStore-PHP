<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title">
                    <h2 class="py-2">
                        Đăng nhập </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Đăng nhập</h3>
                <div class="theme-card">
                    <form action="" method="post" id="admin-form" class="theme-form">
                        <div class="form-group">
                            <label for="username" class="required">Tên tài khoản</label>
                            <input type="text" id="username" name="username" autocomplete="off" style="font-size: 15px;" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="required">Mật khẩu</label>
                            <input type="password" id="password" name="password" autocomplete="off" style="font-size: 15px;" value="" class="form-control">
                        </div>
                        <input type="hidden" id="form[token]" name="form[token]" value="1599208737">
                        <a class="btn btn-solid" href="javascript:loginForm('<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'loginAccount')?>', '<?= ($_SESSION['directToCart']) ?? URL::createLink('default', 'home', 'index', null, 'index.html') ?>')">Đăng nhập</a>
                        
                        <?php 
                        // Sau khi truyền URL directToCart thì xóa session
                        unset($_SESSION['directToCart'])
                        ?>

                    </form>
                </div>
            </div>
            <div class="col-lg-6 right-login">
                <h3>Khách hàng mới</h3>
                <div class="theme-card authentication-right">
                    <h6 class="title-font">Đăng ký tài khoản</h6>
                    <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                        able to order from our shop. To start shopping click register.</p>
                    <a href="<?= URL::createLink($this->arrParam['module'], 'account', 'register', null, 'dang-ky.html')?>" class="btn btn-solid">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</section>
