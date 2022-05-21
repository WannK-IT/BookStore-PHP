<?php
class GroupModel extends Model
{
	private $columns = ['id', 'name', 'group_acp', 'created', 'created_by', 'modified', 'modified_by', 'status'];
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_GROUP);
	}

	public function listItems($arrParams)
	{
		$query[] 	= "SELECT `id`, `name`, `status`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`";
		$query[] 	= "FROM `{$this->table}` WHERE `id` > 0";

		// filter status
		$query[] 	= (!empty($arrParams['status']) && $arrParams['status'] != 'all') ? "AND `status` = '{$arrParams['status']}'" : '';

		// filter group acp
		$query[] 	= ((!empty($arrParams['filter_group_acp'])) && $arrParams['filter_group_acp'] != 'default') ? "AND `group_acp` = '{$arrParams['filter_group_acp']}'" : '';

		//search
		$query[] = (!empty($arrParams['search_value'])) ? "AND `name` LIKE '%" . $arrParams['search_value'] . "%'" : '';

		// order by
		$query[]	= "ORDER BY `id` ASC";

		// pagination
		$pagination			= $arrParams['pagination'];
		$totalItemsPerPage	= $pagination['totalItemsPerPage'];
		if ($totalItemsPerPage > 0) {
			$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
			$query[]	= "LIMIT $position, $totalItemsPerPage";
		}

		$query		= implode(" ", $query);
		$result		= $this->listRecord($query);
		return $result;
	}

	public function singleItem($id)
	{
		$query[] 	= "SELECT `name`, `status`, `group_acp`";
		$query[] 	= "FROM `{$this->table}`";
		$query[] 	= "WHERE `id` = '" . $id . "'";
		$query		= implode(" ", $query);

		$result		= $this->singleRecord($query);
		return $result;
	}

	public function changeStatus($arrParams)
	{
		$id = $arrParams['id'];
		$status = ($arrParams['status'] == 'inactive') ? 'active' : 'inactive';
		$query = "UPDATE `{$this->table}` SET `status` = '$status' WHERE `id` = '$id'";
		$this->query($query);

		return [$id, $status, URL::createLink($arrParams['module'], $arrParams['controller'], 'changeStatus', ['status' => $status, 'id' => $id])];
	}

	public function changeGroupACP($arrParams)
	{
		$id = $arrParams['id'];
		$groupACP = ($arrParams['groupACP'] == 'inactive') ? 'active' : 'inactive';
		$query = "UPDATE `{$this->table}` SET `group_acp` = '$groupACP' WHERE `id` = '$id'";
		$this->query($query);

		return [$id, $groupACP, URL::createLink($arrParams['module'], $arrParams['controller'], 'changeGroupACP', ['groupACP' => $groupACP, 'id' => $id])];
	}

	public function deleteItem($arrParams)
	{
		$ids = (!empty($arrParams['checkbox'])) ? $arrParams['checkbox'] : [$arrParams['id']];
		$this->delete($ids);
	}

	public function statusItem($arrParams)
	{
		$ids = implode(',', $arrParams['checkbox']);
		$query = "UPDATE `{$this->table}` SET `status` = '" . $arrParams['action'] . "' WHERE `id` IN({$ids})";
		$this->query($query);
	}

	public function countItem($arrParams, $option = null)
	{
		if ($option['task'] == 'count-status') {
			$query[] = "SELECT `status`, COUNT(`id`) AS 'countStatus'";
			$query[] = "FROM `{$this->table}` WHERE `id` > 0";

			// search
			$query[] = (!empty($arrParams['search_value'])) ? "AND `name` LIKE '%" . $arrParams['search_value'] . "%'" : '';

			// group_acp
			$query[] 	= ((!empty($arrParams['filter_group_acp'])) && $arrParams['filter_group_acp'] != 'default') ? "AND `group_acp` = '{$arrParams['filter_group_acp']}'" : '';

			$query[] = "GROUP BY `status`";
			$query		= implode(" ", $query);
			$result		= $this->listRecord($query);

			if (!empty($result)) {
				foreach ($result as $value) {
					$status[] = ($value['status']);
					$count[] = $value['countStatus'];
				}
				$result = array_combine($status, $count);
				$result = ['all' => array_sum($result)] + $result;
			}
			return $result;
		}
	}

	public function formHandle($arrParams, $paramsUrl, $option)
	{
		if ($option == 'add') {
			// $arrParams['created'] set default ở phpmyadmin
			$arrParams['created_by'] = Session::get('loginFullname');
			$arrParams['created'] = date('Y-m-d H:i:s');
			$this->insert([$arrParams], 'multi');
		} elseif ($option == 'edit') {
			$arrParams['modified_by'] = Session::get('loginFullname');
			$arrParams['modified'] = date('Y-m-d H:i:s');
			$this->update($arrParams, [['id', $paramsUrl['eid']]]);
		}
	}
}
