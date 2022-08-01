<?php
$xhtml = '';
@$search = $this->arrParam['search_value'];
$arrGroupList = $this->listGroup;
if (!empty($this->list)) {
    foreach ($this->list as $value) {
        $id                 = $value['id'];
        // $userName = HelperBackend::highlightSearch($search, $value['username']); // phần search
        $userName           = HelperBackend::highlightSearch($search, $value['username']);
        $fullName           = HelperBackend::highlightSearch($search, $value['fullname']);
        $email              = HelperBackend::highlightSearch($search, $value['email']);
        $group              = HelperBackend::selectBox('select-group', 'select-group', $arrGroupList, $value['group_id'], $id);
        $status             = HelperBackend::itemStatusAjax($this->arrParam['module'], $this->arrParam['controller'], $id, $value['status'], 'ajaxStatus');
        $created            = HelperBackend::itemHistory($value['created_by'], $value['created']);

        $urlChangePassword  = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'changePassword', ['id' => $id]);
        $urlDelete          = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'delete', ['id' => $id]);
        $urlEdit            = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'form', ['task' => 'edit', 'eid' => $id]);

        $btnChangePassword  = HelperBackend::btnLink($urlChangePassword, 'bg-gradient-secondary', 'Change Password', 'fas fa-key');
        $btnEdit            = HelperBackend::btnLink($urlEdit, 'bg-gradient-info', 'Edit', 'fas fa-pencil-alt');
        $btnDelete          = HelperBackend::btnLink($urlDelete, 'btn-delete bg-gradient-danger', 'Delete', 'fas fa-trash-alt');

        $xhtml .= ' <tr class="">
                        <td class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="checkbox-' . $id . '" name="checkbox[]" value="' . $id . '">
                                <label for="checkbox-' . $id . '" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="text-center">' . $id . '</td>
                        <td>
                            <p class="mb-0">Username: ' . $userName . '</p>
                            <p class="mb-0">Fullname: ' . $fullName . '</p>
                            <p class="mb-0">Email: ' . $email . '</p>
                        </td>
                        <td class="text-center position-relative">' . $group . '</td>
                        <td class="text-center position-relative">' . $status . '</td>
                        <td class="text-center">' . $created . '</td>
                        <td class="text-center">' . $btnChangePassword . $btnEdit . $btnDelete . '</td>
                    </tr>';
    }
} else {
    $xhtml = HelperBackend::showEmptyRow(7, 'Dữ liệu đang được cập nhật');
}

if (isset($_SESSION['messageUser'])) {
    echo '<div id="add-success" class="alert bg-gradient-success font-weight-bold" style="font-size: 15px;" role="alert">' . $_SESSION['messageUser'] . '</div>';
    Session::delete('messageUser');
}
?>

<!-- Search & Filter -->
<?php require_once "elements/search_filter.php" ?>

<!-- List -->
<div class="card card-info card-outline">
    <?php require_once "elements/card-header.php" ?>
    <div class="card-body">
        <?php require_once "elements/control.php" ?>

        <!-- List Content -->
        <form action="<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'value_new') ?>" method="post" class="table-responsive" id="form-table">
            <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
                <thead>
                    <tr>
                        <th class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="check-all">
                                <label for="check-all" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th class="text-center">ID</a></th>
                        <th class="text-left">Info</a></th>
                        <th class="text-center">Group</a></th>
                        <th class="text-center">Status</a></th>
                        <th class="text-center">Created</a></th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $xhtml ?>
                </tbody>
            </table>
            <div>
                <input type="hidden" name="sort_field" value="">
                <input type="hidden" name="sort_order" value="">
            </div>
        </form>
        <!-- End List -->
    </div>
    <?php require_once "elements/pagination.php" ?>
</div>