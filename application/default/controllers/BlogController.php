<?php
class BlogController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function listAction()
	{
		$this->_view->setTitle('Tin tức | BookStore');
		$this->_view->breadcrumb = 'TIN TỨC';

		@$totalItems = $this->_model->countItem($this->_arrParam);
		$this->_view->totalItems = $totalItems['total'];

		// Pagination
		$configPagination = ['totalItemsPerPage'	=> 6, 'pageRange' => 3];
		$this->setPagination($configPagination);
		@$this->_view->pagination	= new Pagination($totalItems['total'], $this->_pagination);

		$this->_view->blogs 		= $this->_model->listItems($this->_arrParam, 'blog');
		$this->_view->blogsNewest 	= $this->_model->listItems($this->_arrParam, 'blogNewest');
		$this->_view->blogsRelated 	= $this->_model->listItems($this->_arrParam, 'blogRelated');
		$this->_view->render('blog/list', true);
	}

	public function itemAction()
	{
		$itemBreadcrumb		= $this->_model->singleItem($this->_arrParam);
		$this->_view->setTitle($itemBreadcrumb['title'] . ' | BookStore');
		$this->_view->breadcrumb 	= '<a href="' . URL::createLink('default', 'blog', 'list', null, "tin-tuc.html") . '" class="mx-1" style="color: #5fcbc4">TIN TỨC </a>/<span class="mx-1"> ' . $itemBreadcrumb['title'] . '</span>';

		$this->_view->blogsNewest 	= $this->_model->listItems($this->_arrParam, 'blogNewest');
		$this->_view->blogsRelated 	= $this->_model->listItems($this->_arrParam, 'blogRelated');
		$this->_view->itemBlog		= $this->_model->singleItem($this->_arrParam);
		$this->_view->render('blog/item', true);
	}
	
}
