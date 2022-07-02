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

	// public function register($params)
    // {

    //     // insert info company first
    //     $dataCompany = array_intersect_key($params, array_flip($this->columnsCompany));
    //     $this->insertOtherTable($dataCompany, 'company');
    //     $lastID =  $this->lastID();

    //     // then insert employer account
    //     $dataEmployer = array_intersect_key($params, array_flip($this->columnsEmployer));
    //     $dataEmployer['comp_id'] = $lastID;
    //     $dataEmployer['emp_password'] = md5($dataEmployer['emp_password']);
    //     $this->insert($dataEmployer);

    //     $query = "SELECT `emp_id` FROM `{$this->table}` WHERE `emp_user` = '".$dataEmployer['emp_user']."' AND `emp_password` = '".$dataEmployer['emp_password']."'";
    //     $getID  = $this->singleRecord($query);

    //     // create a folder storage images
    //     mkdir(UPLOAD_PATH_ADMIN . 'img' . DS . $getID['emp_id']);
    // }

    

}
