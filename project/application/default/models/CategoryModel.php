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
				$query 	= implode(' ', $query);
				$result = $this->listRecord($query);
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
					$position		= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
					$query[]		= "LIMIT $position, $totalItemsPerPage";
				}
				$query 				= implode(' ', $query);
				$arrlistCategory 		= $this->listRecord($query);

				// show total items per page
				$start				= ($position + 1);
				$end  				= $pagination['currentPage'] * $totalItemsPerPage;
				$totalCategory			= $this->countItem($arrParams)['total'];

				/**
				 * vd: showing items 3 - 6 of 20 result => start = 3; end = 6; total = 20
				 * kiểm tra nếu end > total => set end = total
				 */
				if ($end > $totalCategory) {
					$end = $totalCategory;
				}

				/**
				 * vd: thay vì vd: showing items 9 - 9 of 9 result 
				 * thì thay bằng : showing items 9 of 9 result 
				 */
				$rangeItems			= $start . ' - ' . $end;
				if($start == $end){
					$rangeItems		= $end;
				}
				$resultshowItems 	= 'Showing Items ' . $rangeItems . ' of ' . $totalCategory . ' Result ';

				$result = ['list' => $arrlistCategory, 'resultshowItems' => $resultshowItems];
				break;

			case 'footer':
				$query[] = "SELECT `id`, `name`";
				$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
				$query[] = "WHERE `status` = 'active' AND `isShowHome` = 'yes'";
				$query[] = "ORDER BY `ordering`";
				$query[] = "LIMIT 4";
				$query   = implode(' ', $query);
                $result  = $this->listRecord($query);
				break;
		}

		
		return $result;
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
