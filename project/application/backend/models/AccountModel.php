<?php
class AccountModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_USER);
	}

    public function login($params){
		$query[]	= "SELECT `username`, `password`, `fullname`";
		$query[]	= "FROM `{$this->table}`";
		$query[]	= "WHERE `username` = '{$params['username']}' AND `password` = '".md5($params['password'])."'";
		$query		= implode(" ", $query);

		// Query to load information of User
		$loadInfo	= $this->singleRecord($query);

		// Check username & password exist
		if($this->isExist($query) == true){
			$result = 'success';
			Session::set('loginSuccess', true);
			Session::set('loginFullname', $loadInfo['fullname']);
		}else{
			$result = 'failed';
		}
		return $result;
	}

}
