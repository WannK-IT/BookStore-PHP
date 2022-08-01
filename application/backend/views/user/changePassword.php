<?php
$data  = $this->listItem;
$arrElement = [
    // Id
    [
        'label' => FormBackend::createLabel('form[id]', 'Id', false),
        'input' => FormBackend::createInput('form[id]', 'text', $this->arrParam['id'], true)
    ],

    // Username
    [
        'label' => FormBackend::createLabel('form[username]', 'Username', false),
        'input' => FormBackend::createInput('form[username]', 'text', @$data['username'], true)
    ],

    // Fullname
    [
        'label' => FormBackend::createLabel('form[fullname]', 'Fullname', false),
        'input' => FormBackend::createInput('form[fullname]', 'text', @$data['fullname'], true)
    ],

    // Email
    [
        'label' => FormBackend::createLabel('form[email]', 'Email', false),
        'input' => FormBackend::createInput('form[email]', 'email', @$data['email'], true)
    ],

    // Button generate
    [
        'label' => FormBackend::createLabel('form[password]', 'Password', false),
        'input' => FormBackend::createBtnGenerate('form[password]')
    ],

    // Token - Input hidden
    [
        'label' => '',
        'input' => FormBackend::createInputHidden('form[token]', '1596364518')
    ]
];

$showForm = FormBackend::showForm($arrElement);
?>

<div class="card card-outline card-info">
    <form action="" method="post">
        <div class="card-body">
            <?= $showForm ?>
        </div>
        <div class="card-footer">
            <div class="col-12 col-sm-8 offset-sm-2">
                <input type="submit" id="changePassWord" name="changePassword" class="btn bg-gradient-success" value="Save">
                <a href="<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'index') ?>" class="btn bg-gradient-danger ">Cancel</a>
            </div>
        </div>
    </form>
</div>