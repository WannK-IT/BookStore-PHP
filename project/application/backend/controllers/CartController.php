<?php
class CartController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		Authentication::checkLogin();

		$this->_view->getFullName 	= $this->_model->getFullName($this->_arrParam);
	}

	public function indexAction()
	{
		$this->_view->_title = ('Cart :: List');
		$countStatus 	= $this->_model->countItem($this->_arrParam, 'count-status');
		@$totalItems 	= $countStatus[$this->_arrParam['status'] ?? 'all'];
		$this->_view->countStatus = $countStatus;

		// Pagination
		$configPagination = ['totalItemsPerPage'	=> 5, 'pageRange' => 3];
		$this->setPagination($configPagination);
		@$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);

		$this->_view->listOrder 	= $this->_model->listItems($this->_arrParam);
		$this->_view->render('cart/index', true);
	}

	public function changeStatusOrderAction(){
		$result = $this->_model->changeStatusOrder($this->_arrParam);
		echo json_encode($result);
	}

	public function viewOrderAction(){
		$this->_view->_title 	= ('Cart :: Detail');
		$this->_view->infoOrder = $this->_model->singleItem($this->_arrParam);
		$this->_view->render('cart/view_order', true);
	}
}
