<?php
class AccountModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_USER);
	}

	public function login($params)
	{
		$query[]	= "SELECT `id`, `username`, `password`, `fullname`";
		$query[]	= "FROM `{$this->table}`";
		$query[]	= "WHERE `username` = '{$params['username']}' AND `password` = '" . md5($params['password']) . "'";
		$query		= implode(" ", $query);

		// Query to load information of User
		$loadInfo	= $this->singleRecord($query);

		// Check username & password exist
		if ($this->isExist($query)) {
			$result = 'success';
			$_SESSION['loginDefault']['loginSuccess'] = true;
			$_SESSION['loginDefault']['idUser'] = $loadInfo['id'];
			$_SESSION['loginDefault']['fullnameUser'] = $loadInfo['fullname'];
		} else {
			$result = 'failed';
		}
		return $result;
	}

	public function checkExist($arrParams, $option = null)
	{

		if ($option == 'username') {
			$query[]    = "SELECT `username`";
			$query[]    = "FROM `{$this->table}`";
			$query[]    = "WHERE `username` = '{$arrParams['username']}'";
		} elseif ($option == 'password') {
			$query[]    = "SELECT `password`";
			$query[]    = "FROM `{$this->table}`";
			$query[]    = "WHERE `password` = '" . md5($arrParams['old_password']) . "' AND `id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
		}
		$query        = implode(" ", $query);

		// Check query exist
		$result = 'not exist';
		if ($this->isExist($query)) {
			$result = 'exist';
		}
		return $result;
	}

	public function register($params)
	{
		$query = "INSERT INTO `{$this->table}` (`username`, `email`, `fullname`, `password`, `created`, `status`, `group_id`) VALUES ('" . $params['username'] . "', '" . $params['email'] . "', '" . $params['fullname'] . "', '" . md5($params['password']) . "', '" . date('Y-m-d H:i:s') . "', 'active', '210')";
		$this->query($query);
	}

	public function listItems($arrParams, $option)
	{
		if ($option == 'categoryNavbar') {
			$query[] = "SELECT `id`, `name`";
			$query[] = "FROM `" . DB_TBL_CATEGORY . "`";
			$query[] = "WHERE `status` = 'active'";
			$query[] = "ORDER BY `ordering`";

			$query = implode(' ', $query);
			$result = $this->listRecord($query);
			return $result;
		} elseif ($option == 'cart') {
			if (!empty($_SESSION['cart']['quantity'])) {
				$ids = implode(",", array_keys($_SESSION['cart']['quantity']));

				$query[] 	= "SELECT `id`, `name`, `picture`";
				$query[] 	= "FROM `" . DB_TBL_BOOK . "`";
				$query[] 	= "WHERE `status` = 'active' AND `id` IN (" . $ids . ")";
				$query 		= implode(' ', $query);
				$result 	= $this->listRecord($query);

				foreach($result as $key => $value){
					$result[$key]['quantity'] 	= $_SESSION['cart']['quantity'][$value['id']];
					$result[$key]['totalPrice'] = $_SESSION['cart']['price'][$value['id']];
					$result[$key]['price'] 		= $result[$key]['totalPrice'] / $result[$key]['quantity'];
				}
				return $result;
			}
		}
		
	}

	public function singleItem($arrParams)
	{
		$query[] 	= "SELECT `id`, `username`, `email`, `fullname`, `phone`, `address`";;
		$query[] 	= "FROM `{$this->table}`";
		$query[] 	= "WHERE `id` = '" . $arrParams . "'";
		$query		= implode(" ", $query);

		$result		= $this->singleRecord($query);
		return $result;
	}

	public function formHandle($arrParams, $option)
	{
		if ($option == 'edit') {
			$arrParams['modified_by'] 	= $arrParams['fullname'];
			$arrParams['modified'] 		= date('Y-m-d H:i:s');
			$this->update($arrParams, [['id', $_SESSION['loginDefault']['idUser']]]);
		} elseif ($option == 'changePassword') {
			$this->update(md5($arrParams), [['id', $_SESSION['loginDefault']['idUser']]]);
		}
	}

	public function deleteItem($arrParams, $option){
		if($option == 'itemCart'){
			unset($_SESSION['cart']['quantity'][$arrParams['item_id']]);
			unset($_SESSION['cart']['price'][$arrParams['item_id']]);
		}
	}
}
