<?php
class CategoryModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_CATEGORY);
	}

	public function listItems($arrParams, $option)
	{
		switch ($option) {
			case 'categoryNavbar':
				$query[] = "SELECT `c`.`id`, `c`.`name`, count(`b`.`id`) AS 'countBook'";
				$query[] = "FROM `" . $this->table . "` AS `c`";
				$query[] = "LEFT JOIN `" . DB_TBL_BOOK . "` AS `b` ON  `c`.`id` = `b`.`category_id`";
				$query[] = "AND `c`.`status` = 'active' AND `b`.`status` = 'active'";
				$query[] = "GROUP BY `c`.`id`";
				$query[] = "ORDER BY `c`.`ordering`";

				break;

			case 'category':
				$query[] = "SELECT `id`, `name`, `picture`";
				$query[] = "FROM `{$this->table}`";
				$query[] = "WHERE `status` = 'active'";
				$query[] = "ORDER BY `ordering`";

				// pagination
				$pagination			= $arrParams['pagination'];
				$totalItemsPerPage	= $pagination['totalItemsPerPage'];
				if ($totalItemsPerPage > 0) {
					$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
					$query[]	= "LIMIT $position, $totalItemsPerPage";
				}
				break;
		}

		$result = implode(' ', $query);
		return $this->listRecord($result);
	}

	public function countItem($arrParams)
	{
		$query[] = "SELECT COUNT(`id`) AS 'total'";
		$query[] = "FROM `" . $this->table . "`";
		$query[] = "WHERE `status` = 'active'";

		$result  = implode(' ', $query);
		return $this->singleRecord($result);
	}
}
