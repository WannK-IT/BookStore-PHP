<?php

class ErrorController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_view->categoriesNavbar 	= $this->_model->listItems($this->_arrParam, 'categoryNavbar');
		$this->_view->footer 			= $this->_model->listItems($this->_arrParam, 'footer');
	}

	public function indexAction()
	{
		$this->_view->setTitle('Không tìm thấy trang yêu cầu | BookStore');
		$this->_view->render('error/index');
	}

	
}
