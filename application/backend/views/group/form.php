<?php

$arrStatus = ['default' => ' - Select Status - ', 'active' => 'Active', 'inactive' => 'Inactive'];
$arrGroupACP = ['default' => ' - Select Group ACP - ', 'active' => 'Active', 'inactive' => 'Inactive'];

$arrElement = [
    // Name
    [
        'label' => FormBackend::createLabel('form[name]', 'name', true),
        'input' => FormBackend::createInput('form[name]', 'text', @$this->results['name'])
    ],

    // Status
    [
        'label' => FormBackend::createLabel('form[status]', 'status', false),
        'input' => FormBackend::createFormSelectBox('form[status]', $arrStatus, @$this->results['status'])
    ],

    // Group ACP
    [
        'label' => FormBackend::createLabel('form[group_acp]', 'group ACP', false),
        'input' => FormBackend::createFormSelectBox('form[group_acp]', $arrGroupACP, @$this->results['group_acp'])
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

</div>
<div class="card card-info card-outline">
    <form action="" method="post" class="mb-0" id="admin-form">
        <div class="card-body">
            <?= $showForm ?>
        </div>
        <div class="card-footer">
            <div class="col-12 col-sm-8 offset-sm-2">
                <input type="submit" name="submit_form" class="btn btn-sm bg-gradient-success mr-1" value="Save">
                <a href="<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'index')?>" class="btn btn-sm bg-gradient-danger mr-1"> Cancel</a>
            </div>
        </div>
    </form>
</div>