<?php
class CartModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_CART);
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

	public function listItems($arrParams)
	{
		$query[] 	= "SELECT `c`.`id`, `c`.`books`, `c`.`prices`, `c`.`quantities`, `c`.`names`, `c`.`status`, `c`.`date`, `u`.`fullname`, `u`.`email`, `u`.`phone`, `u`.`address`";
		$query[] 	= "FROM `{$this->table}` AS `c`, `user` AS `u` WHERE `c`.`username` = `u`.`username`";
		$query[] 	= "AND `c`.`id` IS NOT NULL ";

		// filter status
		$query[] 	= (!empty($arrParams['status']) && $arrParams['status'] != 'all') ? "AND `c`.`status` = '{$arrParams['status']}'" : '';

		//search
		switch ($arrParams['option_search'] ?? '') {
			case 'id':
				$query[] = (!empty($arrParams['search_value'])) ? "AND `c`.`id` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';
				break;
			case 'fullname':
				$query[] = (!empty($arrParams['search_value'])) ? "AND `u`.`fullname` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';
				break;
			case 'email':
				$query[] = (!empty($arrParams['search_value'])) ? "AND `u`.`email` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';
				break;
			case 'phone':
				$query[] = (!empty($arrParams['search_value'])) ? "AND `u`.`phone` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';
				break;
		}


		// order by
		$query[]	= "ORDER BY `c`.`status` DESC, `c`.`date` DESC";

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

	public function singleItem($arrParams)
	{
		$query[] 	= "SELECT `c`.*, `u`.`fullname`";
		$query[] 	= "FROM `{$this->table}` AS `c`, `user` AS `u` WHERE `c`.`username` = `u`.`username`";
		$query[] 	= "AND `c`.`id` = '" . $arrParams['order_id'] . "'";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);
		return $result;
	}

	public function changeStatusOrder($arrParams)
	{
		$query = "UPDATE `{$this->table}` SET `status` = '" . $arrParams['valueSelected'] . "' WHERE `id` = '" . $arrParams['id'] . "'";
		$this->query($query);
		return ['id' => $arrParams['id'], 'value' => $arrParams['valueSelected']];
	}

	public function countItem($arrParams, $option = null)
	{
		if ($option == 'count-status') {
			$query[] = "SELECT `c`.`status`, COUNT(`c`.`id`) AS 'countStatus'";
			$query[] = "FROM `{$this->table}` AS `c`, `user` AS `u` WHERE `c`.`username` = `u`.`username`";
			$query[] = "AND `c`.`id` IS NOT NULL ";

			// search
			switch ($arrParams['option_search'] ?? '') {
				case 'id':
					$query[] = (!empty($arrParams['search_value'])) ? "AND `c`.`id` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';
					break;
				case 'fullname':
					$query[] = (!empty($arrParams['search_value'])) ? "AND `u`.`fullname` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';
					break;
				case 'email':
					$query[] = (!empty($arrParams['search_value'])) ? "AND `u`.`email` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';
					break;
				case 'phone':
					$query[] = (!empty($arrParams['search_value'])) ? "AND `u`.`phone` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';
					break;
			}

			$query[] = "GROUP BY `c`.`status`";
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
}
