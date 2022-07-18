<?php
$statusCount = $this->countStatus;
$xhtmlStatus = HelperBackend::filterStatus($this->arrParam['module'], $this->arrParam['controller'], $statusCount, ($this->arrParam['status']) ?? 'all', ['search_value' => @$this->arrParam['search_value'], 'filter_special' => @$this->arrParam['filter_special'], 'filter_category' => @$this->arrParam['filter_category']]);

// Select Box Special
$arrSpecial = ['default' => '-- Select Special --', 'yes' => 'Yes', 'no' => 'No'];
$selectBox_Special = HelperBackend::selectBox('filter_special', 'filter_special', $arrSpecial, $this->arrParam['filter_special'] ?? 'default');

// Select Box Category
$arrCategory = ['default' => '-- Select Category --'] + $this->listCategory;
$selectBox_Category = HelperBackend::selectBox('filter_category', 'filter_category', $arrCategory, $this->arrParam['filter_category'] ?? 'default');
?>

<div class="card card-info card-outline">
    <div class="card-header">
        <h6 class="card-title">Search & Filter</h6>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="mb-1">
                <div id="stt">
                    <?= $xhtmlStatus ?>
                </div>
            </div>

            <div class="mb-1">
                <form action="" method="get" id="form-filter-special-category">
                    <input type="hidden" name="module" value="<?= $this->arrParam['module'] ?>">
                    <input type="hidden" name="controller" value="<?= $this->arrParam['controller'] ?>">
                    <input type="hidden" name="action" value="<?= $this->arrParam['action'] ?>">
                    <?= $selectBox_Special ?>
                    <?= $selectBox_Category ?>
                </form>
            </div>
 
            <div class="mb-1">
                <form action="" method="get" id="form-search">
                    <div class="input-group">
                        <input type="hidden" name="module" value="<?= $this->arrParam['module'] ?>">
                        <input type="hidden" name="controller" value="<?= $this->arrParam['controller'] ?>">
                        <input type="hidden" name="action" value="<?= $this->arrParam['action'] ?>">
                        <input id="search_form" type="text" class="form-control form-control-sm" name="search_value" value="<?= @$this->arrParam['search_value'] ?>" style="min-width: 300px" autocomplete="off">

                        <div class="input-group-append">
                            <a href="<?= URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'index') ?>" class="btn btn-sm bg-gradient-danger" id="btn-clear-search">Clear</a>
                            <button type="submit" class="btn btn-sm bg-gradient-info" id="btn-search">Search</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>