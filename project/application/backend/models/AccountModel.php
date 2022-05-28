<?php
class AccountModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_USER);
	}

    public function login($params){
		$query[]	= "SELECT `u`.`id`, `u`.`username`, `u`.`password`, `u`.`fullname`, `g`.`name` AS 'role'";
		$query[]	= "FROM `{$this->table}` AS `u`, `group` AS `g`";
		$query[]	= "WHERE `g`.`id` = `u`.`group_id`";
		$query[]	= "AND `u`.`username` = '{$params['username']}' AND `u`.`password` = '".md5($params['password'])."'";
		$query		= implode(" ", $query);

		// Query to load information of User
		$loadInfo	= $this->singleRecord($query);

		// Check username & password exist
		if($this->isExist($query) == true){
			$result = 'success';
			$_SESSION['login']['loginSuccess'] = true;
			$_SESSION['login']['idUser'] = $loadInfo['id'];
			$_SESSION['login']['loginRole'] = $loadInfo['role'];
		}else{
			$result = 'failed';
		}
		return $result;
	}

}
