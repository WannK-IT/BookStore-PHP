<?php
class BookModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_BOOK);
	}

	public function listItems($arrParams, $option)
	{
		if ($option == 'categoryNavbar') {
			$query[] = "SELECT `id`, `name`";
			$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
			$query[] = "WHERE `status` = 'active'";
			$query[] = "ORDER BY `ordering`";
		} elseif ($option == 'listCategories') {
			$query[] = "SELECT `id`, `name`";
			$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
			$query[] = "WHERE `status` = 'active'";
			$query[] = "ORDER BY `ordering`";
		} elseif ($option == 'listBooks') {
			$query[] = "SELECT `c`.`id` AS 'category_id', `b`.`id` AS 'book_id', `b`.`description`, `b`.`name` AS 'book_name', `c`.`name` AS 'category_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
			$query[] = "FROM `" . DB_TBL_CATEGORY . "` AS `c`, `{$this->table}` AS `b`";
			$query[] = "WHERE `c`.`id` = `b`.`category_id`";
			$query[] = "AND `b`.`status` = 'active' AND `c`.`status` = 'active'";

			// filter category
			$query[] = (!empty($arrParams['cid'])) ? "AND `b`.`category_id` = '" . $arrParams['cid'] . "'" : "";

			// filter price
			// $query[] = (!empty(@$arrParams['sort']) && @$arrParams['sort'] != 'default') ? "ORDER BY `price_discount` " . strtoupper(substr(@$arrParams['sort'], 6, strlen(@$arrParams['sort']))) . "" : "ORDER BY `b`.`ordering`";
			if (@$arrParams['sort'] == 'latest') {
				$query[] = "ORDER BY `b`.`created` DESC";
			} elseif (!empty(@$arrParams['sort']) && @$arrParams['sort'] != 'default') {
				$query[] = "ORDER BY `price_discount` " . strtoupper(substr(@$arrParams['sort'], 6, strlen(@$arrParams['sort']))) . "";
			} else {
				$query[] = "ORDER BY `b`.`ordering`";
			}
		} elseif ($option == 'bookSpecial') {
			$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`name` AS 'book_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
			$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
			$query[] = "WHERE `b`.`category_id` = `c`.`id`";
			$query[] = "AND `b`.`status` = 'active' AND `b`.`special` = 'yes' AND `c`.`status` = 'active'";
			$query[] = "ORDER BY RAND()";
		} elseif ($option == 'bookNew') {
			$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`name` AS 'book_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
			$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
			$query[] = "WHERE `b`.`category_id` = `c`.`id`";
			$query[] = "AND `b`.`status` = 'active' AND `c`.`status` = 'active'";
			$query[] = "ORDER BY `b`.`created` DESC";
			$query[] = "LIMIT 12";
		} elseif ($option == 'listRelate') {
			// get ID Category
			$queryCatID = "SELECT `id`, `category_id` FROM `{$this->table}` WHERE `id` = '" . $arrParams['bid'] . "'";
			$catID		= $this->singleRecord($queryCatID)['category_id'];

			// query to get relate book from ID Category
			$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`name` AS 'book_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
			$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
			$query[] = "WHERE `b`.`category_id` = `c`.`id`";
			$query[] = "AND `b`.`status` = 'active' AND `c`.`status` = 'active'";
			$query[] = "AND `b`.`category_id` = '" . $catID . "' AND `b`.`id` NOT IN ('" . $arrParams['bid'] . "')";
			$query[] = "ORDER BY RAND()";
			$query[] = "LIMIT 6";
		}

		$result = implode(' ', $query);
		return $this->listRecord($result);
	}

	public function singleItem($arrParams, $option)
	{
		if ($option == 'ajaxModalView') {
			$query[] = "SELECT `id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, round(`price` - ((`price` * `sale_off`)/100)) AS 'price_discount'";
			$query[] = "FROM `{$this->table}`";
			$query[] = "WHERE `id` = '" . $arrParams['id'] . "'";
		} elseif ($option == 'infoItem') {
			$query[] = "SELECT `id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `category_id`, round(`price` - ((`price` * `sale_off`)/100)) AS 'price_discount'";
			$query[] = "FROM `{$this->table}`";
			$query[] = "WHERE `id` = '" . $arrParams['bid'] . "'";
		} elseif ($option == 'getCategoryName') {
			$query[] = "SELECT `name`";
			$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
			$query[] = "WHERE `id` = '" . $arrParams['cid'] . "'";
		} elseif ($option == 'getBookName') {
			$query[] = "SELECT `name`";
			$query[] = "FROM `{$this->table}`";
			$query[] = "WHERE `id` = '" . $arrParams['bid'] . "'";
		}

		$result = implode(' ', $query);
		return $this->singleRecord($result);
	}
}
