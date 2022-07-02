<?php
$picture = '';
if(!empty($this->results['picture']) && empty($this->errors)){
    $picture = '<div class="col-12 col-sm-8 offset-sm-2">
                    <img src="'.UPLOAD_CATEGORY_URL . $this->results['picture'].'" alt="preview image" id="" style="width: 100%; max-width: 100px">
                </div>';
}else{
    $picture = '';
}

$arrStatus          = ['default' => ' - Select Status - ', 'active' => 'Active', 'inactive' => 'Inactive'];
$arrshowHomepage    = ['default' => ' - Select Show Home - ', 'yes' => 'Yes', 'no' => 'No'];
$arrElement = [
    // Name
    [
        'label' => FormBackend::createLabel('form[name]', 'name'),
        'input' => FormBackend::createInput('form[name]', 'text', @$this->results['name'])
    ],

    // Ordering
    [
        'label' => FormBackend::createLabel('form[ordering]', 'ordering'),
        'input' => FormBackend::createInput('form[ordering]', 'number', @$this->results['ordering'])
    ],

    // Status
    [
        'label' => FormBackend::createLabel('form[status]', 'status'),
        'input' => FormBackend::createFormSelectBox('form[status]', $arrStatus, @$this->results['status'])
    ],

    // Show Home
    [
        'label' => FormBackend::createLabel('form[isShowHome]', 'Show Homepage'),
        'input' => FormBackend::createFormSelectBox('form[isShowHome]', $arrshowHomepage, @$this->results['isShowHome'])
    ],

    // Picture
    [
        'label' => FormBackend::createLabel('picture', 'Picture'),
        'input' => FormBackend::createInputFile('picture', 'admin-file-upload')
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
    <form action="" method="post" class="mb-0" id="admin-form" enctype="multipart/form-data">
        <div class="card-body">
            <?= $showForm . $picture?>

        </div>
        <div class="card-footer">
            <div class="col-12 col-sm-8 offset-sm-2">
            <input type="submit" name="submit_category" class="btn btn-sm bg-gradient-success mr-1" value="Save">
                <!-- <a href="" class="btn btn-sm btn-success mr-1"> Save & Close</a>
            <a href="" class="btn btn-sm btn-success mr-1"> Save & New</a> -->
                <a href="<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'index') ?>" class="btn btn-sm bg-gradient-danger mr-1"> Cancel</a>
            </div>
        </div>
    </form>

</div>