<div class="card card-outline card-primary" >
    <div class="card-header text-center">
        <a class="h1 text-dark"><b>Admin</b></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg text-dark">Sign in to start your session</p>
        <form action="" method="post" id="form-login">
            <div class="input-group mb-3">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 float-right">
                    <a class="btn btn-primary btn-block" href="javascript:loginForm('<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'loginAccount')?>', '<?= URL::createLink('backend', 'dashboard', 'index')?>')">Sign In</a>
                </div>
            </div>
        </form>

    </div>

</div>