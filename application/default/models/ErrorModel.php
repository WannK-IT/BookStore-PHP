<?php
class ErrorModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_BOOK);
	}

	public function listItems($arrParams, $option)
	{
		switch ($option) {
			case 'categoryNavbar':
				$query[] = "SELECT `c`.`id`, `c`.`name`, count(`b`.`id`) AS 'countBook'";
				$query[] = "FROM `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "LEFT JOIN `" . DB_TBL_BOOK . "` AS `b` ON  `c`.`id` = `b`.`category_id`";
				$query[] = "AND `c`.`status` = 'active' AND `b`.`status` = 'active'";
				$query[] = "GROUP BY `c`.`id`";
				$query[] = "ORDER BY `c`.`ordering`";
				break;
			case 'footer':
				$query[] = "SELECT `id`, `name`";
				$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
				$query[] = "WHERE `status` = 'active' AND `isShowHome` = 'yes'";
				$query[] = "ORDER BY `ordering`";
				$query[] = "LIMIT 4";
				break;
		}

		$result = implode(' ', $query);
		return $this->listRecord($result);
	}

}
