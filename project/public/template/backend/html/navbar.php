<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#" role="button">
                <i class="fas fa-eye"></i> View Site
            </a>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?= $this->_dirImg?>logoAdmin.png" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"><b><?= Session::get('loginFullname')?></b></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-info">
                    <img src="<?= $this->_dirImg?>logoAdmin.png" class="img-circle elevation-2" alt="User Image">

                    <p><b><?= Session::get('loginFullname')?></b><small><?= Session::get('loginRole')?></small></p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    <a href="<?= URL::createLink($this->arrParam['module'], 'account', 'logoutAccount')?>" class="btn btn-default btn-flat float-right">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>