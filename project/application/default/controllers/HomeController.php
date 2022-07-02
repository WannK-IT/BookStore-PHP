<?php
class HomeController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		Session::init();

	}

	public function indexAction()
	{
		$this->_view->setTitle('BookStore');
		$this->_view->itemsSpecial = $this->_model->listItems('bookSpecial');
		$this->_view->listSpecial = $this->_model->listItems('listItemsSpecial');
		$this->_view->render('home/index', true);
	}

	public function ajaxLoadInfoAction()
	{
		$result = $this->_model->infoItem($this->_arrParam);
		echo json_encode($result);
	}

}
