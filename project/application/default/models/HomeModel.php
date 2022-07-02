<?php
class HomeModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_BOOK);
	}

	public function listItems($option)
	{
		if ($option == 'bookSpecial') {
			$query[] = "SELECT `b`.`id`, `b`.`name`, `b`.`description`, `b`.`price`, `b`.`special`, `b`.`sale_off`, `b`.`picture`";
			$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
			$query[] = "WHERE `b`.`category_id` = `c`.`id`";
			$query[] = "AND `b`.`special` = 'yes' AND `b`.`status` = 'active' AND `c`.`status` = 'active'";
			$query[] = "ORDER BY `b`.`ordering`";
			
		}elseif ($option == 'listItemsSpecial') {
			$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`description`, `b`.`name` AS 'book_name', `c`.`name` AS 'category_name', `b`.`price`, `b`.`special`, `b`.`sale_off`, `b`.`picture`, `b`.`category_id`";
			$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
			$query[] = "WHERE `b`.`category_id` = `c`.`id`";
			$query[] = "AND `b`.`status` = 'active' AND `b`.`special` = 'yes' AND `c`.`status` = 'active' AND `c`.`isShowHome` = 'yes'";
			$query[] = "ORDER BY `c`.`ordering`";						
		}

		$result = implode(' ', $query);
			return $this->listRecord($result);
	}

	public function infoItem($arrParams)
	{
		$query[] = "SELECT `id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`";
		$query[] = "FROM `" . DB_TBL_BOOK . "`";
		$query[] = "WHERE `id` = '" . $arrParams['id'] . "' AND `status` = 'active'";

		$result = implode(' ', $query);
		return $this->singleRecord($result);
	}
}
