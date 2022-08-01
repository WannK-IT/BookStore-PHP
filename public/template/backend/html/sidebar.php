<?php
ob_start();
$arrItemGroup   =   [
    [
        'link' => URL::createLink($this->arrParam['module'], 'group', 'index'),
        'icon' => 'fas fa-list-ul',
        'title' => 'list'
    ],
    [
        'link' => URL::createLink($this->arrParam['module'], 'group', 'form'),
        'icon' => 'fas fa-edit',
        'title' => 'form'
    ],
];

$arrItemUser    =   [
    [
        'link' => URL::createLink($this->arrParam['module'], 'user', 'index'),
        'icon' => 'fas fa-list-ul',
        'title' => 'list'
    ],
    [
        'link' => URL::createLink($this->arrParam['module'], 'user', 'form'),
        'icon' => 'fas fa-edit',
        'title' => 'form'
    ],
];

$arrItemBook    =   [
    [
        'link' => URL::createLink($this->arrParam['module'], 'book', 'index'),
        'icon' => 'fas fa-list-ul',
        'title' => 'list'
    ],
    [
        'link' => URL::createLink($this->arrParam['module'], 'book', 'form'),
        'icon' => 'fas fa-edit',
        'title' => 'form'
    ],
];

$arrItemCategory    =   [
    [
        'link' => URL::createLink($this->arrParam['module'], 'category', 'index'),
        'icon' => 'fas fa-list-ul',
        'title' => 'list'
    ],
    [
        'link' => URL::createLink($this->arrParam['module'], 'category', 'form'),
        'icon' => 'fas fa-edit',
        'title' => 'form'
    ],
];


$arrItemSlider    =   [
    [
        'link' => URL::createLink($this->arrParam['module'], 'slider', 'index'),
        'icon' => 'fas fa-list-ul',
        'title' => 'list'
    ],
    [
        'link' => URL::createLink($this->arrParam['module'], 'slider', 'form'),
        'icon' => 'fas fa-edit',
        'title' => 'form'
    ],
];

$dashboard  = HelperBackend::itemSideBar('single', URL::createLink($this->arrParam['module'], 'dashboard', 'index'), 'dashboard', 'fas fa-tachometer-alt', $this->arrParam['controller']);
$cart       = HelperBackend::itemSideBar('single', URL::createLink($this->arrParam['module'], 'cart', 'index'), 'cart', 'fas fa-shopping-cart', $this->arrParam['controller']);
$group      = HelperBackend::itemSideBar('multi', '#', 'group', 'fas fa-users', $this->arrParam['controller'], $arrItemGroup);
$user       = HelperBackend::itemSideBar('multi', '#', 'user', 'fas fa-user', $this->arrParam['controller'], $arrItemUser);
$book       = HelperBackend::itemSideBar('multi', '#', 'book', 'fas fa-book-open', $this->arrParam['controller'], $arrItemBook);
$category   = HelperBackend::itemSideBar('multi', '#', 'category', 'far fa-list-alt', $this->arrParam['controller'], $arrItemCategory);
$slider     = HelperBackend::itemSideBar('multi', '#', 'slider', 'fas fa-sliders-h', $this->arrParam['controller'], $arrItemSlider);


// Check Permission
if($_SESSION['login']['loginRole'] == 'admin' || $_SESSION['login']['loginRole'] == 'manager'){
    $sideBarList = $dashboard . $group . $user . $category . $book . $slider . $cart;
}else{
    $sideBarList = $dashboard . $category . $book . $slider . $cart;
}
?>

<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?module=backend&controller=dashboard&action=index" class="brand-link">
        <img src="<?= $this->_dirImg ?>faviconWeb.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BOOKSTORE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $this->_dirImg ?>logoAdmin.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="index.php?module=backend&controller=dashboard&action=index" class="d-block"><b><?= $this->getFullName['fullname'] ?></b><br><small><?= $_SESSION['login']['loginRole'] ?></small></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?=  $sideBarList ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>