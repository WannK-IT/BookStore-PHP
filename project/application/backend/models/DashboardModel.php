<?php
class DashboardModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_BOOK);
	}

	public function getFullName()
	{
		$query[] 	= "SELECT `fullname`";
		$query[] 	= "FROM `user`";
		$query[] 	= "WHERE `id` = '" . $_SESSION['login']['idUser'] . "'";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);

		return $result;
	}

	public function countItem($option)
	{
		switch ($option) {
			case 'group':
				$query[] = "SELECT COUNT(`id`) AS 'totalGroup'";
				$query[] = "FROM `group`";
				break;
			case 'user':
				$query[] = "SELECT COUNT(`id`) AS 'totalUser'";
				$query[] = "FROM `user`";
				break;
			case 'category':
				$query[] = "SELECT COUNT(`id`) AS 'totalCategory'";
				$query[] = "FROM `category`";
				break;
			case 'book':
				$query[] = "SELECT COUNT(`id`) AS 'totalBook'";
				$query[] = "FROM `book`";
				break;
			case 'cart':
				$query[] = "SELECT COUNT(`id`) AS 'totalCart'";
				$query[] = "FROM `cart`";
				break;
		}

		$query = implode(" ", $query);
		return $this->singleRecord($query);
	}
}
