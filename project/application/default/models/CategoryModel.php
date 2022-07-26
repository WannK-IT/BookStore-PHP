<?php
class CategoryModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_CATEGORY);
	}

	public function listItems($option)
	{
		if ($option == 'categoryNavbar') {
			$query[] = "SELECT `c`.`id`, `c`.`name`, count(`b`.`id`) AS 'countBook'";
			$query[] = "FROM `" . DB_TBL_CATEGORY . "` AS `c`";
			$query[] = "LEFT JOIN `" . DB_TBL_BOOK . "` AS `b` ON  `c`.`id` = `b`.`category_id`";
			$query[] = "AND `c`.`status` = 'active' AND `b`.`status` = 'active'";
			$query[] = "GROUP BY `c`.`id`";
			$query[] = "ORDER BY `c`.`ordering`";
		} elseif ($option == 'category') {
			$query[] = "SELECT `id`, `name`, `picture`";
			$query[] = "FROM `{$this->table}`";
			$query[] = "WHERE `status` = 'active'";
			$query[] = "ORDER BY `ordering`";
		}

		$result = implode(' ', $query);
		return $this->listRecord($result);
	}
}
