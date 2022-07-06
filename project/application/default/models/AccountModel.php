<?php
class AccountModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_USER);
	}

    public function login($params){
		$query[]	= "SELECT `id`, `username`, `password`, `fullname`";
		$query[]	= "FROM `{$this->table}`";
		$query[]	= "WHERE `username` = '{$params['username']}' AND `password` = '".md5($params['password'])."'";
		$query		= implode(" ", $query);

		// Query to load information of User
		$loadInfo	= $this->singleRecord($query);

		// Check username & password exist
		if($this->isExist($query)){
			$result = 'success';
			$_SESSION['loginDefault']['loginSuccess'] = true;
			$_SESSION['loginDefault']['idUser'] = $loadInfo['id'];
			$_SESSION['loginDefault']['fullnameUser'] = $loadInfo['fullname'];
	
		}else{
			$result = 'failed';
		}
		return $result;
	}

	public function checkExistAccount($arrParams)
    {
        $query[]    = "SELECT `username`";
        $query[]    = "FROM `{$this->table}`";
        $query[]    = "WHERE `username` = '{$arrParams['username']}'";
        $query        = implode(" ", $query);

        // Query to load information of employer
        $result = 'not exist';
        if ($this->isExist($query)) {
            $result = 'exist';
        }
        return $result;
    }

	public function register($params){
		$query[]	= "SELECT `id`, `username`, `password`, `fullname`";
		$query[]	= "FROM `{$this->table}`";
		$query[]	= "WHERE `username` = '{$params['username']}' AND `password` = '".md5($params['password'])."'";
		$query		= implode(" ", $query);

		// Query to load information of User
		$loadInfo	= $this->singleRecord($query);

		// Check username & password exist
		if($this->isExist($query) == true){
			$result = 'exist';
		}else{
			$result = 'not exist';
		}
		return $result;
	}

	public function listItems($option)
	{
		if ($option == 'categoryNavbar') {
			$query[] = "SELECT `id`, `name`";
			$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
			$query[] = "WHERE `status` = 'active'";
			$query[] = "ORDER BY `ordering`";
		}

		$result = implode(' ', $query);
		return $this->listRecord($result);
	}

}
