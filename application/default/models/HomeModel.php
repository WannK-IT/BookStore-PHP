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
		switch ($option) {
			case 'bookSpecial':
				$query[] = "SELECT `b`.`id`, `b`.`name`, `b`.`description`, `b`.`price`, `b`.`special`, `b`.`sale_off`, `b`.`picture`, `c`.`name` AS 'category_name', round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "WHERE `b`.`category_id` = `c`.`id`";
				$query[] = "AND `b`.`special` = 'yes' AND `b`.`status` = 'active' AND `c`.`status` = 'active' AND `c`.`isShowHome` = 'yes'";
				$query[] = "ORDER BY `b`.`ordering`";
				break;
			case 'listItemsSpecial':
				$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`description`, `b`.`name` AS 'book_name', `c`.`name` AS 'category_name', `b`.`price`, `b`.`special`, `b`.`sale_off`, `b`.`picture`, `b`.`category_id`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "WHERE `b`.`category_id` = `c`.`id`";
				$query[] = "AND `b`.`status` = 'active' AND `b`.`special` = 'yes' AND `c`.`status` = 'active' AND `c`.`isShowHome` = 'yes'";
				$query[] = "ORDER BY `c`.`ordering`";
				break;
			case 'slider':
				$query[] = "SELECT `picture`";
				$query[] = "FROM `" . DB_TBL_SLIDER . "`";
				$query[] = "WHERE `status` = 'active'";
				$query[] = "ORDER BY `ordering`";
				break;
			case 'blog':
				$query[] = "SELECT `id`, `title`, `content`, `posted_by`, `posted_date`, `picture`";
				$query[] = "FROM `" . DB_TBL_BLOG . "`";
				$query[] = "WHERE `status` = 'active'";
				$query[] = "AND `ordering` != '1'";
				$query[] = "ORDER BY `ordering`";
				break;
		}

		$result = implode(' ', $query);
		return $this->listRecord($result);
	}

	public function infoItem($arrParams, $option)
	{
		if ($option == 'ajaxModalView') {
			$query[] = "SELECT `b`.`id`, `b`.`name`, `b`.`description`, `b`.`price`, `b`.`special`, `b`.`sale_off`, `b`.`picture`, `c`.`name` AS 'category_name'";
			$query[] = "FROM `{$this->table}` AS `b`, `category` AS `c`";
			$query[] = "WHERE `b`.`category_id` = `c`.`id`";
			$query[] = "AND `b`.`id` = '" . $arrParams['id'] . "' AND `b`.`status` = 'active'";

			$query = implode(' ', $query);
			$result = $this->singleRecord($query);

			// create link url
			$idBook				= $result['id'];
			$bookNameURL		= URL::filterURL($result['name']);
			$categoryNameURL	= URL::filterURL($result['category_name']);
			$urlViewBook		= URL::createLink('default', 'book', 'item', ['bid' => $idBook], "$categoryNameURL/$bookNameURL-$idBook.html");
			$link				= ['link' => $urlViewBook];

			return $result + $link;
		}

		
	}
}
