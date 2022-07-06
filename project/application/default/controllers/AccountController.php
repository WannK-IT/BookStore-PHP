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

		$this->_view->categoriesNavbar = $this->_model->listItems('categoryNavbar');
	}

    public function loginAction(){		
		$this->_view->setTitle('Đăng nhập');
		$this->_view->render('account/login');
	}

	public function loginAccountAction()
	{
		$result =  $this->_model->login($this->_arrParam);
		echo $result;
	}

	public function logoutAccountAction(){
		Session::delete('loginDefault');
		URL::direct('default', 'account', 'login');
	}

    public function registerAction(){		
		$this->_view->setTitle('Đăng ký');
		$this->_view->render('account/register');
	}

	public function checkExistAction(){
		$result = $this->_model->checkExist($this->_arrParam);
		echo json_encode($result);
	}

	public function registerAccountAction(){
		$result =  $this->_model->register($this->_arrParam);
		echo $result;
	}

	public function accountFormAction(){
		$this->_view->render('account/account_form');
	}

}
