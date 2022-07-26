<?php
$xhtml = '';
$search = $this->arrParam['search_value'] ?? '';

if (!empty($this->list)) {
    foreach ($this->list as $value) {
        $id         = $value['id'];
        $name       = HelperBackend::highlightSearch($search, $value['name']);
        $picture    = UPLOAD_SLIDER_URL . $value['picture'];
        $status     = HelperBackend::itemStatusAjax($this->arrParam['module'], $this->arrParam['controller'], $id, $value['status'], 'ajaxStatus');
        $ordering   = $value['ordering'];
        $created    = HelperBackend::itemHistory($value['created_by'], $value['created']);
        $modified   = HelperBackend::itemHistory($value['modified_by'], $value['modified']);
        $urlDelete  = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'delete', ['id' => $id]);
        $urlEdit    = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'form', ['task' => 'edit', 'eid' => $id]);

        $btnEdit = HelperBackend::btnLink($urlEdit, 'bg-gradient-info', 'Edit', 'fas fa-pencil-alt');
        $btnDelete = HelperBackend::btnLink($urlDelete, 'btn-delete bg-gradient-danger', 'Delete', 'fas fa-trash-alt');

        $xhtml .= '<tr id="position-' . $id . '">
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="checkbox-' . $id . '" name="checkbox[]" value="' . $id . '">
                            <label for="checkbox-' . $id . '" class="custom-control-label"></label>
                        </div>
                    </td>
                    <td class="text-center">' . $id . '</td>
                    <td class="text-wrap">
                        <p class="mb-2"><span class="font-weight-bold">Name: </span>' . $name . '</p>
                        <p class="mb-1">
                            <a href="javascript:modalImg(\'' . $picture . '\')">
                            <img class="img-fluid" style="width: 100%; max-height: 150px" src="' . $picture . '">
                            </a>
                        </p>  
                    </td>
                    <td class="text-center position-relative">' . $status . '</td>
                    <td class="text-center position-relative">
                        <input type="number" name="chkOrderingSlider[' . $id . ']" value="' . $ordering . '" class="chkOrderingSlider form-control form-control-sm m-auto text-center" style="width: 65px" id="chkOrderingSlider[' . $id . ']" data-id="' . $id . '" min="1">
                    </td>
                    <td class="text-center">' . $created . '</td>
                    <td class="text-center modified-1">' . $modified . '</td>
                    <td class="text-center">
                        ' . $btnEdit . $btnDelete . '
                    </td>
                </tr>';
    }
} else {
    $xhtml = HelperBackend::showEmptyRow(8, 'Dữ liệu đang được cập nhật');
}

if (isset($_SESSION['message'])) {
    echo '<div id="add-success" class="alert bg-gradient-success font-weight-bold" style="font-size: 15px;" role="alert">' . $_SESSION['message'] . '</div>';
    Session::delete('message');
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
                        <th class="text-center">ID</th>
                        <th class="text-center">Info</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Ordering</th>
                        <th class="text-center">Created</th>
                        <th class="text-center">Modified</th>
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

<!-- Quick-view modal popup start-->
<?= FormBackend::modalViewImg() ?>
<!-- Quick-view modal popup end-->