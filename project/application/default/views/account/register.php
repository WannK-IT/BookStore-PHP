<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title">
                    <h2 class="py-2">Đăng ký tài khoản</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Đăng ký tài khoản</h3>
                <div class="theme-card">
                    <form action="" method="post" id="admin-form-register" class="theme-form">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="username" class="required">Tên tài khoản</label>
                                <input type="text" id="username" name="username" style="font-size: 15px;" value="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="fullname">Họ và tên</label>
                                <input type="text" id="fullname" name="fullname" style="font-size: 15px;" value="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="required">Email</label>
                                <input type="email" id="email" name="email" style="font-size: 15px;" value="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="required">Mật khẩu</label>
                                <input type="password" id="password" name="password" style="font-size: 15px;" value="" class="form-control">
                            </div>
                        </div>
                        <a class="btn btn-solid" href="javascript:registerForm('<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'registerAccount')?>', '<?= URL::createLink('default', 'account', 'login')?>')">Đăng ký</a>
                    </form>
                </div>
                <p class="mt-4 h6">Đã có tài khoản ? <a style="color: #5fcbc4" class="font-weight-bold" href="<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'login')?>">Đăng nhập ngay</a></p>
            </div>
        </div>
    </div>
</section>