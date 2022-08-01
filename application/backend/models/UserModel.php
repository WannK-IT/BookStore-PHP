<?php
class UserModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_USER);
	}

	public function listItems($arrParams)
	{
		$query[] 	= "SELECT `id`, `username`, `email`, `fullname`, `password`, `created`, `created_by`, `status`, `group_id`";
		$query[] 	= "FROM `{$this->table}`";
		$query[] 	= "WHERE `id` > 0";

		// filter status
		$query[] 	= (!empty($arrParams['status']) && $arrParams['status'] != 'all') ? "AND `status` = '{$arrParams['status']}'" : '';

		// filter group user
		$query[] 	= ((!empty($arrParams['filter_group'])) && $arrParams['filter_group'] != 'default') ? "AND `group_id` = '{$arrParams['filter_group']}'" : '';

		// search
		$query[] = (!empty($arrParams['search_value'])) ? "AND `username` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';

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
		$query[] 	= "SELECT `id`, `username`, `email`, `fullname`, `password`, `status`, `group_id`";;
		$query[] 	= "FROM `{$this->table}`";
		$query[] 	= "WHERE `id` = '" . $id . "'";
		$query		= implode(" ", $query);

		$result		= $this->singleRecord($query);
		return $result;
	}

	// List group
	public function listGroup()
	{
		$query[]	= "SELECT `id`, `name` FROM `group`";
		$query		= implode(" ", $query);
		$result		= array_column($this->listRecord($query), 'name', 'id');
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
			$query[] 		= "SELECT `status`, COUNT(`id`) AS 'countStatus'";
			$query[] 		= "FROM `{$this->table}` WHERE `id` > 0";

			// search
			$query[] 		= (!empty($arrParams['search_value'])) ? "AND `username` LIKE '%" . $arrParams['search_value'] . "%'" : '';

			// group user
			$query[] 		= ((!empty($arrParams['filter_group'])) && $arrParams['filter_group'] != 'default') ? "AND `group_id` = '{$arrParams['filter_group']}'" : '';

			$query[] 		= "GROUP BY `status`";
			$query			= implode(" ", $query);
			$result			= $this->listRecord($query);

			foreach ($result as $value) {
				$status[] 	= $value['status'];
				$count[] 	= $value['countStatus'];
			}
			if (!empty($status) || !empty($count)) {

				$result 	= array_combine($status, $count);
				$result 	= ['all' => array_sum($result)] + $result;
			}
			return $result;
		}
	}

	public function formHandle($arrParams, $paramsUrl, $option)
	{
		if ($option == 'add') {
			// $arrParams['created'] set default ở phpmyadmin
			$arrParams['created_by'] 	= self::getFullName()['fullname'];
			$arrParams['created'] 		= date('Y-m-d H:i:s');
			$this->insert([$arrParams], 'multi');
		} elseif ($option == 'edit') {
			$arrParams['modified_by'] 	= self::getFullName()['fullname'];
			$arrParams['modified'] 		= date('Y-m-d H:i:s');
			$this->update($arrParams, [['id', $paramsUrl['eid']]]);
		}
	}

	public function updatePassword($arrParams)
	{
		if (!empty($arrParams)) {
			$query = "UPDATE `{$this->table}` SET `password` = '" . md5($arrParams['password']) . "' WHERE `id` = '{$arrParams['id']}'";
			$this->query($query);
		}
	}

	public function changeGroupUser($idElement, $idGroupSelected)
	{
		$query = "UPDATE `{$this->table}` SET `group_id` = '{$idGroupSelected}' WHERE `id` = '{$idElement}'";
		$this->query($query);

		return [$idElement, $idGroupSelected];
	}

	public function getFullName()
	{
		$query[] 	= "SELECT `fullname`";
		$query[] 	= "FROM `user`";
		$query[] 	= "WHERE `id` = '" . $_SESSION['login']['idUser'] . "'";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);

		return $result;
	}
}
