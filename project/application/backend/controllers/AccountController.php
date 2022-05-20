<?php 
    
class AccountController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		Session::init();
	}

    public function loginAction(){
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('login.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		
		$this->_view->setTitle('Đăng nhập');
		$this->_view->render('account/login');
	}

	public function loginAccountAction()
	{
		$result =  $this->_model->login($this->_arrParam);
		echo $result;
	}

	public function logoutAccountAction(){
		Session::delete('loginSuccess');
		Session::delete('loginFullname');
		URL::direct('backend', 'account', 'login');
	}

}
