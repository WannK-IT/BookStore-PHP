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
			$query[] = "SELECT `b`.`id`, `b`.`name`, `b`.`description`, `b`.`price`, `b`.`special`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
			$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
			$query[] = "WHERE `b`.`category_id` = `c`.`id`";
			$query[] = "AND `b`.`special` = 'yes' AND `b`.`status` = 'active' AND `c`.`status` = 'active' AND `c`.`isShowHome` = 'yes'";
			$query[] = "ORDER BY `b`.`ordering`";
		} elseif ($option == 'listItemsSpecial') {
			$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`description`, `b`.`name` AS 'book_name', `c`.`name` AS 'category_name', `b`.`price`, `b`.`special`, `b`.`sale_off`, `b`.`picture`, `b`.`category_id`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
			$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
			$query[] = "WHERE `b`.`category_id` = `c`.`id`";
			$query[] = "AND `b`.`status` = 'active' AND `b`.`special` = 'yes' AND `c`.`status` = 'active' AND `c`.`isShowHome` = 'yes'";
			$query[] = "ORDER BY `c`.`ordering`";
		} elseif ($option == 'categoryNavbar') {
			$query[] = "SELECT `id`, `name`";
			$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
			$query[] = "WHERE `status` = 'active'";
			$query[] = "ORDER BY `ordering`";
		}

		$result = implode(' ', $query);
		return $this->listRecord($result);
	}

	public function infoItem($arrParams, $option)
	{
		if ($option == 'ajaxModalView') {
			$query[] = "SELECT `id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`";
			$query[] = "FROM `{$this->table}`";
			$query[] = "WHERE `id` = '" . $arrParams['id'] . "' AND `status` = 'active'";
		}

		$result = implode(' ', $query);
		return $this->singleRecord($result);
	}
}
