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
		switch ($option) {
			case 'categoryNavbar':
				$query[] = "SELECT `c`.`id`, `c`.`name`, count(`b`.`id`) AS 'countBook'";
				$query[] = "FROM `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "LEFT JOIN `" . DB_TBL_BOOK . "` AS `b` ON  `c`.`id` = `b`.`category_id`";
				$query[] = "AND `c`.`status` = 'active' AND `b`.`status` = 'active'";
				$query[] = "GROUP BY `c`.`id`";
				$query[] = "ORDER BY `c`.`ordering`";
				break;

			case 'listCategories':
				$query[] = "SELECT `id`, `name`";
				$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
				$query[] = "WHERE `status` = 'active'";
				$query[] = "ORDER BY `ordering`";
				break;

			case 'listBooks':
				$query[] = "SELECT `c`.`id` AS 'category_id', `b`.`id` AS 'book_id', `b`.`description`, `b`.`name` AS 'book_name', `c`.`name` AS 'category_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `" . DB_TBL_CATEGORY . "` AS `c`, `{$this->table}` AS `b`";
				$query[] = "WHERE `c`.`id` = `b`.`category_id`";
				$query[] = "AND `b`.`status` = 'active' AND `c`.`status` = 'active'";

				// filter search
				$query[] = (!empty($arrParams['search'])) ? "AND `b`.`name` LIKE '%" . trim($arrParams['search']) . "%'" : "";

				// filter category
				$query[] = (!empty($arrParams['cid'])) ? "AND `b`.`category_id` = '" . $arrParams['cid'] . "'" : "";

				// filter price
				if (@$arrParams['sort'] == 'latest') {
					$query[] = "ORDER BY `b`.`created` DESC";
				} elseif (!empty(@$arrParams['sort']) && @$arrParams['sort'] != 'default') {
					$query[] = "ORDER BY `price_discount` " . strtoupper(substr(@$arrParams['sort'], 6, strlen(@$arrParams['sort']))) . "";
				} else {
					$query[] = "ORDER BY `b`.`ordering`";
				}

				// pagination
				$pagination			= $arrParams['pagination'];
				$totalItemsPerPage	= $pagination['totalItemsPerPage'];
				if ($totalItemsPerPage > 0) {
					$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
					$query[]	= "LIMIT $position, $totalItemsPerPage";
				}
				break;

			case 'bookSpecial':
				$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`name` AS 'book_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "WHERE `b`.`category_id` = `c`.`id`";
				$query[] = "AND `b`.`status` = 'active' AND `b`.`special` = 'yes' AND `c`.`status` = 'active'";
				$query[] = "ORDER BY RAND()";
				break;

			case 'bookNew':
				$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`name` AS 'book_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "WHERE `b`.`category_id` = `c`.`id`";
				$query[] = "AND `b`.`status` = 'active' AND `c`.`status` = 'active'";
				$query[] = "ORDER BY `b`.`created` DESC";
				$query[] = "LIMIT 12";
				break;

			case 'listRelate':
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
				break;

			case 'comment':
				$query[] = "SELECT `text`, `fullname`, `created`";
				$query[] = "FROM `" . DB_TBL_COMMENT . "`";
				$query[] = "WHERE `book_id` = '" . $arrParams['bid'] . "'";
				$query[] = "AND `status` = 'active'";
				$query[] = "ORDER BY `created` DESC";
				break;
		}

		$result = implode(' ', $query);
		return $this->listRecord($result);
	}

	public function singleItem($arrParams, $option)
	{
		switch ($option) {
			case 'ajaxModalView':
				$query[] = "SELECT `id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, round(`price` - ((`price` * `sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `{$this->table}`";
				$query[] = "WHERE `id` = '" . $arrParams['id'] . "'";
				break;

			case 'infoItem':
				$query[] = "SELECT `id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `category_id`, round(`price` - ((`price` * `sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `{$this->table}`";
				$query[] = "WHERE `id` = '" . $arrParams['bid'] . "'";
				break;

			case 'getCategoryName':
				$query[] = "SELECT `name`";
				$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
				$query[] = "WHERE `id` = '" . $arrParams['cid'] . "'";
				break;

			case 'getBookName':
				$query[] = "SELECT `c`.`name` AS 'category_name', `b`.`name` AS 'book_name', `b`.`category_id` AS 'category_id'";
				$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "WHERE `b`.`category_id` = `c`.`id`";
				$query[] = "AND `b`.`id` = '" . $arrParams['bid'] . "'";
				break;
		}

		$result = implode(' ', $query);
		return $this->singleRecord($result);
	}

	public function countItem($arrParams)
	{
		$query[] = "SELECT COUNT(`b`.`id`) AS 'total'";
		$query[] = "FROM `" . DB_TBL_CATEGORY . "` AS `c`, `{$this->table}` AS `b`";
		$query[] = "WHERE `c`.`id` = `b`.`category_id`";
		$query[] = "AND `b`.`status` = 'active' AND `c`.`status` = 'active'";

		// filter search
		$query[] = (!empty($arrParams['search'])) ? "AND `b`.`name` LIKE '%" . trim($arrParams['search']) . "%'" : "";

		// filter category
		$query[] = (!empty($arrParams['cid'])) ? "AND `b`.`category_id` = '" . $arrParams['cid'] . "'" : "";

		$result  = implode(' ', $query);
		return $this->singleRecord($result);
	}

	public function comment($arrParams)
	{
		$comment 	= $arrParams['comment'];
		$fullname	= $_SESSION['loginDefault']['fullnameUser'];
		$date		= date('Y-m-d H:i:s');
		$bookID		= $arrParams['book_id'];

		$query[] 	= "INSERT INTO `" . DB_TBL_COMMENT . "` (`text`, `fullname`, `status`, `created`, `book_id`)";
		$query[] 	= "VALUES ('" . $comment . "', '" . $fullname . "', 'active', '" . $date . "', '" . $bookID . "')";
		$query 		= implode($query);
		$this->query($query);

		$countCmt	= "SELECT count(`id`) AS 'sumCMT' FROM `" . DB_TBL_COMMENT . "` WHERE `book_id` = '" . $bookID . "'";
		$countCmt	= $this->singleRecord($countCmt);
		return ['fullname' => $fullname, 'comment' => $comment, 'created' => date('d/m/Y', strtotime($date)), 'count' => $countCmt['sumCMT']];
	}
}
