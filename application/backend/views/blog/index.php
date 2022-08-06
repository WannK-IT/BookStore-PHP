<?php
$xhtml = '';
@$search = $this->arrParam['search_value'];

if (!empty($this->list)) {
    foreach ($this->list as $value) {
        $id                 = $value['id'];
        $title              = HelperBackend::highlightSearch($search, $value['title']);
        $status             = HelperBackend::itemStatusAjax($this->arrParam['module'], $this->arrParam['controller'], $id, $value['status'], 'ajaxStatus');
        $picture            = ($value['picture'] != null) ? UPLOAD_BLOG_URL . $value['picture'] : IMG_ADMIN_URL . 'no-image.jpg';
        $ordering           = $value['ordering'];
        $created            = HelperBackend::itemHistory($value['posted_by'], $value['posted_date']);

        $urlDelete          = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'delete', ['id' => $id]);
        $urlEdit            = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'form', ['task' => 'edit', 'id' => $id]);

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
                        <td class="text-left">' . $title . '</td>
                        <td class="text-center">
                            <a href="javascript:modalImg(\'' . $picture . '\')">
                            <img class="img-fluid" style="max-height: 100px" src="' . $picture . '">
                            </a>
                        </td>
                        <td class="text-center position-relative">' . $status . '</td>
                        <td class="text-center position-relative">
                            <input type="number" name="chkOrderingBlog[' . $id . ']" value="' . $ordering . '" class="chkOrderingBlog form-control form-control-sm m-auto text-center" style="width: 65px" id="chkOrderingBlog[' . $id . ']" data-id="' . $id . '" min="1">
                        </td>
                        <td class="text-center">' . $created . '</td>
                        <td class="text-center">' . $btnEdit . $btnDelete . '</td>
                    </tr>';
    }
} else {
    $xhtml = HelperBackend::showEmptyRow(8, 'Dữ liệu đang được cập nhật');
}

if (isset($_SESSION['messageBlog'])) {
    echo '<div id="add-success" class="alert bg-gradient-success font-weight-bold" style="font-size: 15px;" role="alert">' . $_SESSION['messageBlog'] . '</div>';
    Session::delete('messageBlog');
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
                        <th class="text-left">Title</a></th>
                        <th class="text-center">Picture</a></th>
                        <th class="text-center">Status</a></th>
                        <th class="text-center">Ordering</a></th>
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

<!-- Quick-view modal popup start-->
<?= FormBackend::modalViewImg() ?>
<!-- Quick-view modal popup end-->