<?php
class CategoryController extends Controller
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

	public function listAction()
	{
		$this->_view->categories = $this->_model->listItems('category');
		$this->_view->render('category/list', true);
	}

}
