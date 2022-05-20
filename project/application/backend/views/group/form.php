<?php
if (!empty($this->errors)) {
    echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Lỗi!</h5>
                <ul class="list-unstyled" style="font-size: 17px">
                <pre style="color: blue;"><li class="text-white list-unstyled">';
    print_r($this->errors);
    echo '</li></pre></ul></div>';
}

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
                <!-- <a href="index.php?module=backend&controller=group&action=form" class="btn btn-sm btn-success mr-1"> Save</a> -->
                <!-- <a href="" class="btn btn-sm btn-success mr-1"> Save & Close</a> -->
                <!-- <a href="" class="btn btn-sm btn-success mr-1"> Save & New</a> -->
                <a href="<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'index')?>" class="btn btn-sm bg-gradient-danger mr-1"> Cancel</a>
            </div>
        </div>
    </form>
</div>