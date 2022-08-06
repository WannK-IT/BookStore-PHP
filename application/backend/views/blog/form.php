<?php
$picture = '';
if (!empty($this->results['picture']) && empty($this->errors)) {
    $picture = '<div class="col-12 col-sm-8 offset-sm-2">
                    <img src="' . UPLOAD_BLOG_URL . $this->results['picture'] . '" alt="preview image img-fluid" style="height: 200px">
                </div>';
} else {
    $picture = '';
}

$arrStatus          = ['default' => ' - Select Status - ', 'active' => 'Active', 'inactive' => 'Inactive'];

$arrElement = [
    // Title
    [
        'label' => FormBackend::createLabel('form[title]', 'title'),
        'input' => FormBackend::createInput('form[title]', 'text', @$this->results['title'])
    ],

    // Content
    [
        'label' => FormBackend::createLabel('form[content]', 'content'),
        'input' => FormBackend::createCKEditor('form[content]', 10, @$this->results['content'])
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

    // Picture
    [
        'label' => FormBackend::createLabel('picture', 'picture'),
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
<script src="//cdn.ckeditor.com/4.18.0/full-all/ckeditor.js"></script>
<div class="card card-info card-outline">
    <form action="" method="post" class="mb-0" id="admin-form" enctype="multipart/form-data">
        <div class="card-body">
            <?= $showForm . $picture ?>

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