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
			$_SESSION['loginDefault']['idUser'] 		= $loadInfo['id'];
			$_SESSION['loginDefault']['username'] 		= $loadInfo['username'];
			$_SESSION['loginDefault']['fullnameUser'] 	= $loadInfo['fullname'];
			$_SESSION['loginDefault']['timeout'] 		= time() + SESSION_TIMEOUT;
		} else {
			$result = 'failed';
		}
		return $result;
	}

	public function checkExist($arrParams, $option = null)
	{
		switch ($option) {
			case 'username':
				$query[]    = "SELECT `username`";
				$query[]    = "FROM `{$this->table}`";
				$query[]    = "WHERE `username` = '{$arrParams['username']}'";
				$query        = implode(" ", $query);

				// Check query exist
				$result = 'not exist';
				if ($this->isExist($query)) {
					$result = 'exist';
				}
				break;
			case 'password':
				$query[]    = "SELECT `password`";
				$query[]    = "FROM `{$this->table}`";
				$query[]    = "WHERE `password` = '" . md5($arrParams['old_password']) . "' AND `id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
				$query        = implode(" ", $query);

				// Check query exist
				$result = 'not exist';
				if ($this->isExist($query)) {
					$result = 'exist';
				}
				break;
			case 'fullInfo':
				$query[]    = "SELECT `address`";
				$query[]    = "FROM `{$this->table}`";
				$query[]    = "WHERE `id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
				$query      = implode(" ", $query);
				$execute	= $this->singleRecord($query);
				// Check query exist
				$result = 'not exist';
				if (!empty($execute['address'])) {
					$result = 'exist';
				}
				break;
		}

		return $result;
	}

	public function register($params)
	{
		$queryGetIDUser	= "SELECT `id` FROM `" . DB_TBL_GROUP . "` WHERE `name` = 'user'";
		$idUser			= $this->singleRecord($queryGetIDUser);

		$query = "INSERT INTO `{$this->table}` (`username`, `email`, `fullname`, `password`, `created`, `status`, `group_id`) VALUES ('" . $params['username'] . "', '" . $params['email'] . "', '" . $params['fullname'] . "', '" . md5($params['password']) . "', '" . date('Y-m-d H:i:s') . "', 'active', '" . $idUser['id'] . "')";
		$this->query($query);
	}

	public function listItems($arrParams, $option)
	{
		switch ($option) {
			case 'cart':
				if (!empty($_SESSION['cart']['quantity'])) {

					$ids = implode(",", array_keys($_SESSION['cart']['quantity']));
					$query[] 	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `c`.`name` AS 'category_name'";
					$query[] 	= "FROM `" . DB_TBL_BOOK . "` AS `b`, `category` AS `c`";
					$query[] 	= "WHERE `b`.`category_id` = `c`.`id`";
					$query[] 	= "AND `b`.`status` = 'active' AND `b`.`id` IN (" . $ids . ")";
					$query 		= implode(' ', $query);

					$result 	= $this->listRecord($query);

					foreach ($result as $key => $value) {
						$result[$key]['quantity'] 	= $_SESSION['cart']['quantity'][$value['id']];
						$result[$key]['totalPrice'] = $_SESSION['cart']['price'][$value['id']];
						$result[$key]['price'] 		= $result[$key]['totalPrice'] / $result[$key]['quantity'];
					}
					return $result;
				}
				break;
			case 'order-history':
				$query[] 	= "SELECT *";
				$query[] 	= "FROM `" . DB_TBL_CART . "`";
				$query[] 	= "WHERE `username` = '" . $_SESSION['loginDefault']['username'] . "'";
				$query[] 	= "ORDER BY `status` DESC, `date` DESC";
				$query 		= implode(' ', $query);
				$result 	= $this->listRecord($query);
				return $result;
				break;
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
			$query = "UPDATE `{$this->table}` SET `password` = '" . md5($arrParams) . "' WHERE `id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
			$this->query($query);
		}
	}

	public function deleteItem($arrParams, $option)
	{
		if ($option == 'itemCart') {
			unset($_SESSION['cart']['quantity'][$arrParams['item_id']]);
			unset($_SESSION['cart']['price'][$arrParams['item_id']]);
		}
	}

	public function saveItem($arrParams, $option)
	{
		if ($option == 'saveCart') {
			$id			= HelperFrontend::randomString(10);
			$username	= $_SESSION['loginDefault']['username'];
			$books		= json_encode($arrParams['form']['book_id']);
			$prices		= json_encode($arrParams['form']['price']);
			$quantities	= json_encode($arrParams['form']['quantity']);
			$names		= json_encode($arrParams['form']['name'], JSON_UNESCAPED_UNICODE);
			$pictures	= json_encode($arrParams['form']['picture']);
			$date		= date('Y-m-d H:i:s');

			$query[] 	= "INSERT INTO `" . DB_TBL_CART . "` (`id`, `username`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`)";
			$query[] 	= "VALUES ('" . $id . "', '" . $username . "', '" . $books . "', '" . $prices . "', '" . $quantities . "', '" . $names . "', '" . $pictures . "', 'inactive', '" . $date . "')";
			$query 		= implode(" ", $query);
			$this->query($query);
			return $id;
		}
	}
}
