<?php
if(!empty($this->results)){
    $data = $this->results;
}

$arrStatus  = ['default' => ' - Select Status - ', 'active' => 'Active', 'inactive' => 'Inactive'];
$arrGroup   = $this->listGroup;

$arrElement = [
    // Username
    [
        'label' => FormBackend::createLabel('form[username]', 'Username', true),
        'input' => FormBackend::createInput('form[username]', 'text', @$data['username'])
    ],

    // Password
    [
        'label' => FormBackend::createLabel('form[password]', 'Password', true),
        'input' => FormBackend::createInput('form[password]', 'password', @$data['password'])
    ],

    // Email
    [
        'label' => FormBackend::createLabel('form[email]', 'Email', true),
        'input' => FormBackend::createInput('form[email]', 'email', @$data['email'])
    ],

    // Fullname
    [
        'label' => FormBackend::createLabel('form[fullname]', 'Fullname', true),
        'input' => FormBackend::createInput('form[fullname]', 'text', @$data['fullname'])
    ],

    // Status
    [
        'label' => FormBackend::createLabel('form[status]', 'Status', true),
        'input' => FormBackend::createFormSelectBox('form[status]', $arrStatus, @$data['status'])
    ],

    // Group
    [
        'label' => FormBackend::createLabel('form[group_id]', 'Group', true),
        'input' => FormBackend::createFormSelectBox('form[group_id]', $arrGroup, @$data['group_id'])
    ],

    // Token - Input hidden
    [
        'label' => '',
        'input' => FormBackend::createInputHidden('form[token]', '1596364518')
    ]
];

$showForm = FormBackend::showForm($arrElement);
FormBackend::showError(($this->errors) ?? '');
?>
<div class="card card-info card-outline">
    <form method="post" class="mb-0" id="admin-form">
        <div class="card-body">
            <?= $showForm ?>
        </div>
        <div class="card-footer">
            <div class="col-12 col-sm-8 offset-sm-2">
                <input type="submit" name="add_user" class="btn btn-sm bg-gradient-success mr-1" value="Save">
                <!-- <a href="" class="btn btn-sm btn-success mr-1"> Save & Close</a>
                <a href="" class="btn btn-sm btn-success mr-1"> Save & New</a> -->
                <a href="<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'index')?>" class="btn btn-sm bg-gradient-danger mr-1"> Cancel</a>
            </div>
        </div>
    </form>
</div>