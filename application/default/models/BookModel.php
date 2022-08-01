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
				$query	 = implode(' ', $query);
				$result = $this->listRecord($query);
				break;

			case 'listCategories':
				$query[] = "SELECT `id`, `name`";
				$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
				$query[] = "WHERE `status` = 'active'";
				$query[] = "ORDER BY `ordering`";
				$query	 = implode(' ', $query);
				$result = $this->listRecord($query);
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
					$position		= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
					$query[]		= "LIMIT $position, $totalItemsPerPage";
				}
				$query = implode(' ', $query);
				$arrlistBooks 		= $this->listRecord($query);

				// show total items per page
				$start				= ($position + 1);
				$end  				= $pagination['currentPage'] * $totalItemsPerPage;
				$totalBooks			= $this->countItem($arrParams)['total'];

				/**
				 * vd: showing items 3 - 6 of 20 result => start = 3; end = 6; total = 20
				 * kiểm tra nếu end > total => set end = total
				 */
				if ($end > $totalBooks) {
					$end = $totalBooks;
				}

				/**
				 * vd: thay vì vd: showing items 9 - 9 of 9 result 
				 * thì thay bằng : showing items 9 of 9 result 
				 */
				$rangeItems			= $start . ' - ' . $end;
				if($start == $end){
					$rangeItems		= $end;
				}
				$resultshowItems 	= 'Showing Items ' . $rangeItems . ' of ' . $totalBooks . ' Result ';

				$result = ['list' => $arrlistBooks, 'resultshowItems' => $resultshowItems];
				break;

			case 'bookSpecial':
				$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`name` AS 'book_name', `c`.`name` AS 'category_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "WHERE `b`.`category_id` = `c`.`id`";
				$query[] = "AND `b`.`status` = 'active' AND `b`.`special` = 'yes' AND `c`.`status` = 'active'";
				$query[] = "ORDER BY RAND()";
				$query	 = implode(' ', $query);
				$result  = $this->listRecord($query);
				break;

			case 'bookNew':
				$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`name` AS 'book_name', `c`.`name` AS 'category_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "WHERE `b`.`category_id` = `c`.`id`";
				$query[] = "AND `b`.`status` = 'active' AND `c`.`status` = 'active'";
				$query[] = "ORDER BY `b`.`created` DESC";
				$query[] = "LIMIT 12";
				$query	 = implode(' ', $query);
				$result = $this->listRecord($query);
				break;

			case 'listRelate':
				// get ID Category
				$queryCatID = "SELECT `id`, `category_id` FROM `{$this->table}` WHERE `id` = '" . $arrParams['bid'] . "'";
				$catID		= $this->singleRecord($queryCatID)['category_id'];

				// query to get relate book from ID Category
				$query[] = "SELECT `b`.`id` AS 'book_id', `b`.`name` AS 'book_name', `c`.`name` AS 'category_name', `b`.`price`, `b`.`sale_off`, `b`.`picture`, round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
				$query[] = "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] = "WHERE `b`.`category_id` = `c`.`id`";
				$query[] = "AND `b`.`status` = 'active' AND `c`.`status` = 'active'";
				$query[] = "AND `b`.`category_id` = '" . $catID . "' AND `b`.`id` NOT IN ('" . $arrParams['bid'] . "')";
				$query[] = "ORDER BY RAND()";
				$query[] = "LIMIT 6";
				$query	 = implode(' ', $query);
				$result  = $this->listRecord($query);
				break;

			case 'comment':
				$query[] = "SELECT `text`, `fullname`, `created`";
				$query[] = "FROM `" . DB_TBL_COMMENT . "`";
				$query[] = "WHERE `book_id` = '" . $arrParams['bid'] . "'";
				$query[] = "AND `status` = 'active'";
				$query[] = "ORDER BY `created` DESC";
				$query	 = implode(' ', $query);
				$result  = $this->listRecord($query);
				break;

			case 'footer':
				$query[] = "SELECT `id`, `name`";
				$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
				$query[] = "WHERE `status` = 'active' AND `isShowHome` = 'yes'";
				$query[] = "ORDER BY `ordering`";
				$query[] = "LIMIT 4";
				$query	 = implode(' ', $query);
				$result  = $this->listRecord($query);
				break;
		}

		return $result;
	}

	public function singleItem($arrParams, $option)
	{
		switch ($option) {
			case 'ajaxModalView':
				$query[] 	= "SELECT `b`.`id`, `b`.`name`, `b`.`description`, `b`.`price`, `b`.`special`, `b`.`sale_off`, `b`.`picture`, `c`.`name` AS 'category_name', round(`b`.`price` - ((`b`.`price` * `b`.`sale_off`)/100)) AS 'price_discount'";
				$query[] 	= "FROM `{$this->table}` AS `b`, `category` AS `c`";
				$query[] 	= "WHERE `b`.`category_id` = `c`.`id`";
				$query[] 	= "AND `b`.`id` = '" . $arrParams['id'] . "'";
				$query	 	= implode(' ', $query);

				$result  	= $this->singleRecord($query);

				// create link url
				$idBook				= $result['id'];
				$bookNameURL		= URL::filterURL($result['name']);
				$categoryNameURL	= URL::filterURL($result['category_name']);
				$urlViewBook		= URL::createLink('default', 'book', 'item', ['bid' => $idBook], "$categoryNameURL/$bookNameURL-$idBook.html");
				$link				= ['link' => $urlViewBook];

				return $result + $link;
				break;

			case 'infoItem':
				$query[] 	= "SELECT `id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `category_id`, round(`price` - ((`price` * `sale_off`)/100)) AS 'price_discount'";
				$query[] 	= "FROM `{$this->table}`";
				$query[] 	= "WHERE `id` = '" . $arrParams['bid'] . "'";
				$result 	= implode(' ', $query);
				return $this->singleRecord($result);
				break;

			case 'getCategoryName':
				$query[] 	= "SELECT `name`";
				$query[] 	= "FROM `" . DB_TBL_CATEGORY . "`";
				$query[] 	= "WHERE `id` = '" . $arrParams['cid'] . "'";
				$result 	= implode(' ', $query);
				return $this->singleRecord($result);
				break;

			case 'getBookName':
				$query[] 	= "SELECT `c`.`name` AS 'category_name', `b`.`name` AS 'book_name', `b`.`category_id` AS 'category_id'";
				$query[] 	= "FROM `{$this->table}` AS `b`, `" . DB_TBL_CATEGORY . "` AS `c`";
				$query[] 	= "WHERE `b`.`category_id` = `c`.`id`";
				$query[] 	= "AND `b`.`id` = '" . $arrParams['bid'] . "'";
				$result 	= implode(' ', $query);
				return $this->singleRecord($result);
				break;
		}
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
