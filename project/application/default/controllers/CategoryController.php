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
		
		$this->_view->categoriesNavbar = $this->_model->listItems($this->_arrParam, 'categoryNavbar');
	}

	public function listAction()
	{
		$this->_view->setTitle('Danh mục | BookStore');
		@$totalItems = $this->_model->countItem($this->_arrParam);
		$this->_view->totalItems = $totalItems['total'];

		// Pagination
		$configPagination = ['totalItemsPerPage'	=> 10, 'pageRange' => 3];
		$this->setPagination($configPagination);
		@$this->_view->pagination	= new Pagination($totalItems['total'], $this->_pagination);

		$this->_view->categories = $this->_model->listItems($this->_arrParam, 'category');
		$this->_view->render('category/list', true);
	}

}
