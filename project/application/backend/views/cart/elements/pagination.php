<div class="card-footer clearfix">
    <?= $this->pagination->showPaginationBackend(URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'index', ['status' => ($this->arrParam['status']) ?? 'all', 'search_value' => $this->arrParam['search_value'] ?? '', 'option_search' => $this->arrParam['option_search'] ?? '']))?>
</div>
