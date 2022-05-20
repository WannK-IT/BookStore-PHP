<?php
$statusCount = $this->countStatus;
$xhtmlStatus = HelperBackend::filterStatus($this->arrParam['module'], $this->arrParam['controller'], $statusCount, ($this->arrParam['status']) ?? 'all', @$this->arrParam['search_value'], @$this->arrParam['filter_group_acp']);

// Select Box Group User
$arrGroupList = ['default' => '-- Select Group --'] + $this->listGroup;
$selectBox_GroupACP = HelperBackend::selectBox('filter_group', 'filter_group', $arrGroupList, @$this->arrParam['filter_group']);
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
                <form action="" method="get" id="form_group">
                    <input type="hidden" name="module" value="<?= $this->arrParam['module'] ?>">
                    <input type="hidden" name="controller" value="<?= $this->arrParam['controller'] ?>">
                    <input type="hidden" name="action" value="index">
                    <?= $selectBox_GroupACP ?>
                </form>
            </div>
            <div class="mb-1">
                <form action="" method="get" id="form-search">
                    <div class="input-group">
                        <input type="hidden" name="module" value="backend">
                        <input type="hidden" name="controller" value="user">
                        <input type="hidden" name="action" value="index">
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