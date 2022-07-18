<?php

class AccountController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		Session::init();
		$this->_view->categoriesNavbar = $this->_model->listItems($this->_arrParam, 'categoryNavbar');
	}

	public function loginAction()
	{
		$this->_view->setTitle('Đăng nhập');
		$this->_view->render('account/login');
	}

	public function loginAccountAction()
	{
		$result =  $this->_model->login($this->_arrParam);
		echo $result;
	}

	public function logoutAccountAction()
	{
		Session::delete('loginDefault');
		URL::direct('default', 'account', 'login');
	}

	public function registerAction()
	{
		$this->_view->setTitle('Đăng ký');
		$this->_view->render('account/register');
	}

	public function checkExistAction()
	{
		$result = $this->_model->checkExist($this->_arrParam, 'username');
		echo json_encode($result);
	}

	public function registerAccountAction()
	{
		$this->_model->register($this->_arrParam);
		Session::set('createAccountSuccess', true);
	}

	public function accountFormAction()
	{
		$this->_view->breadcrumb = 'Thông tin tài khoản';
		$infoItem 	= $this->_model->singleItem($_SESSION['loginDefault']['idUser']);
		if (!empty($infoItem)) {
			$this->_view->infoAccount 	= $infoItem;
		}

		if (!empty($this->_arrParam['form']) && $this->_arrParam['form']['token'] > 0) {
			$source = [
				'username' 	=> $this->_arrParam['form']['username'],
				'email' 	=> $this->_arrParam['form']['email'],
				'fullname' 	=> $this->_arrParam['form']['fullname'],
				'phone' 	=> $this->_arrParam['form']['phone'],
				'address' 	=> $this->_arrParam['form']['address']
			];

			$validate = new Validate($source);
			$validate->addRule('username', 'string', ['min' => 1, 'max' => 100])
					->addRule('email', 'email', ['min' => 1, 'max' => 100])
					->addRule('fullname', 'string', ['min' => 5, 'max' => 100])
					->addRule('phone', 'string', ['min' => 10, 'max' => 11])
					->addRule('address', 'string', ['min' => 5, 'max' => 100]);
			$validate->run();
			$this->_view->infoAccount 	 	= $validate->getResult();
			$params 				 		= $validate->getResult();

			// kiểm tra hợp lệ
			if (!$validate->isValid()) {
				$this->_view->errors = $validate->showErrors();
			} else {
				$this->_model->formHandle($params, 'edit');
				Session::set('updateInfoUser', true);
				$this->redirect('default', 'account', 'accountForm');
				ob_end_flush();
			}
		}
		$this->_view->render('account/account_form');
	}


	public function orderFormAction()
	{
		$this->_view->breadcrumb = 'Lịch sử mua hàng';
		$this->_view->render('account/order_form');
	}

	public function changePasswordFormAction()
	{
		$this->_view->breadcrumb = 'Thay đổi mật khẩu';
		if(!empty($this->_arrParam['form']) && $this->_arrParam['form']['token'] > 0){
			if(empty($this->_arrParam['form']['old_password']) || empty($this->_arrParam['form']['new_password'])){
				$this->_view->errors = '<li>Please type password !</li>';
			}else{
				if($this->_arrParam['form']['old_password'] !== $this->_arrParam['form']['new_password']){
					$this->_view->errors = '<li><b>Password: </b>is not match. Please try again !</li>';
				}else{
					$checkPass = $this->_model->checkExist($this->_arrParam['form'], 'password');
					if($checkPass == 'exist'){
						$this->_model->formHandle($this->_arrParam['form']['new_password'], 'changePassword');
						Session::set('changePasswordDefault', true);
						$this->redirect('default', 'account', 'changePasswordForm');
					}else{
						$this->_view->errors = '<li><b>Old password: </b>is incorrect. Please try again !</li>';
					}
				}
			}
		}
		$this->_view->render('account/changePassword_form');
	}

	public function orderAction()
	{
		$bookID	= $this->_arrParam['order_id'];
		$price	= $this->_arrParam['order_price'];
		if (empty($_SESSION['cart'])) {
			$_SESSION['cart']['quantity'][$bookID] 		= 1;
			$_SESSION['cart']['price'][$bookID] 		= $price;
		} else {
			if (key_exists($bookID, $_SESSION['cart']['quantity'])) {
				$_SESSION['cart']['quantity'][$bookID] 	+= 1;
				$_SESSION['cart']['price'][$bookID] 	= $price * $_SESSION['cart']['quantity'][$bookID];
			} else {
				$_SESSION['cart']['quantity'][$bookID] 	= 1;
				$_SESSION['cart']['price'][$bookID] 	= $price;
			}
		}
		echo json_encode(count($_SESSION['cart']['quantity']));
	}

	public function cartAction(){
		// Kiểm tra nếu chưa đăng nhập thì chuyển trang login
		// if(!isset($_SESSION['loginDefault']['idUser'])){
        //     URL::direct('default', 'account', 'login');
        // }else{
			$this->_view->itemsCart = $this->_model->listItems($this->_arrParam, 'cart');
			$this->_view->breadcrumb = 'Giỏ hàng';
			$this->_view->render('account/cart');
		// }
	}

	public function removeItemCartAction(){
		$this->_model->deleteItem($this->_arrParam, 'itemCart');
		URL::direct($this->_arrParam['module'], $this->_arrParam['controller'], 'cart');
	}

	public function ajaxChangeQtyAction(){
		$bookID 	= $this->_arrParam['bookID'];
		$qty 		= $this->_arrParam['qty'];
		$price 		= $this->_arrParam['price'];
		$_SESSION['cart']['quantity'][$bookID] 	= $qty;
		$_SESSION['cart']['price'][$bookID] 	= $price * $qty;
		echo json_encode(
			[	
				'book_id' => $bookID, 
				'quantity_item' => $_SESSION['cart']['quantity'][$bookID],
				'summaryQuantity' => count($_SESSION['cart']['quantity']), 
				'totalPriceItem' => $_SESSION['cart']['price'][$bookID],
				'totalPriceBooks' => array_sum($_SESSION['cart']['price'])
			]
		);
	}

	public function buyAction(){
		echo '<pre style="color: blue;">';
		print_r($this->_arrParam);
		echo '</pre>';
	}
}
