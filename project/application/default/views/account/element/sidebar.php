<?php 
$sidebar = '';
$arrSideBarAccount = [
    [
        'link'      => URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'accountForm'),
        'name'      => 'Thông tin tài khoản',
        'id'        => 'accountForm',
        'active'    => $this->arrParam['action']
    ],
    [
        'link'      => URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'changePasswordForm'),
        'name'      => 'Thay đổi mật khẩu',
        'id'        => 'changePasswordForm',
        'active'    => $this->arrParam['action']
    ],
    [
        'link'      => URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'orderHistory'),
        'name'      => 'Lịch sử mua hàng',
        'id'        => 'orderHistory',
        'active'    => $this->arrParam['action']
    ],
    [
        'link'      => URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'logoutAccount'),
        'name'      => 'Đăng xuất',
        'id'        => '',
        'active'    => ''
    ]
];

foreach($arrSideBarAccount as $value){
    $sidebar .= HelperFrontend::sidebar($value['link'], $value['name'], $value['id'], $value['active'], 'account');
}

?>

<div class="col-lg-3">
    <div class="account-sidebar">
        <a class="popup-btn">Menu</a>
    </div>
    <h3 class="d-lg-none">Tài khoản</h3>
    <div class="dashboard-left">
        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> Ẩn</span></div>
        <div class="block-content">
            <ul>
                <?= $sidebar ?>
            </ul>
        </div>
    </div>
</div>
