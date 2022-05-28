<?php
class IndexController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		Session::init();
		Authentication::checkLoginDefault();

		// $this->_view->getFullName = $this->_model->getFullName($this->_arrParam);
	}

	public function indexAction()
	{
		// $this->_view->_title = ('Group :: List');
		
		$this->_view->render('index/index', true);
	}

}
