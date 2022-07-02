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

	public function countItem($option){
		if($option == 'group'){
			$query[] = "SELECT COUNT(`id`) AS 'totalGroup'";
			$query[] = "FROM `group`";
		}elseif($option == 'user'){
			$query[] = "SELECT COUNT(`id`) AS 'totalUser'";
			$query[] = "FROM `user`";
		}elseif($option == 'category'){
			$query[] = "SELECT COUNT(`id`) AS 'totalCategory'";
			$query[] = "FROM `category`";
		}elseif($option == 'book'){
			$query[] = "SELECT COUNT(`id`) AS 'totalBook'";
			$query[] = "FROM `book`";
		}

		$query = implode(" ", $query);
		return $this->singleRecord($query);
	}

}
