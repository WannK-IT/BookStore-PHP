<?php
class BookController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		// Navbar
		$this->_view->categoriesNavbar 	= $this->_model->listItems($this->_arrParam, 'categoryNavbar');

		// Breadcrumb
		if ($this->_arrParam['action'] == 'list') {
			$this->_view->breadcrumb 		= '<span class="mx-1">TẤT CẢ SÁCH </span>';
			if (isset($this->_arrParam['cid'])) {
				$getCategoryName 			= $this->_model->singleItem($this->_arrParam, 'getCategoryName');
				$this->_view->breadcrumb 	= '<a href="' . URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], $this->_arrParam['action'], null, 'sach.html') . '" class="mx-1" style="color: #5fcbc4">TẤT CẢ SÁCH </a>' . DS . '<span class="mx-1"> ' . $getCategoryName['name'] . '</span>';
			}
		} elseif ($this->_arrParam['action'] == 'item') {
			$getBookInfo 		= $this->_model->singleItem($this->_arrParam, 'getBookName');
			$bookName			= $getBookInfo['book_name'];
			$categoryName 		= $getBookInfo['category_name'];
			$categoryID			= $getBookInfo['category_id'];
			$categoryNameURL	= URL::filterURL($categoryName);
			$this->_view->breadcrumb = '<a href="' . URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'list', null, 'sach.html') . '" class="mx-1" style="color: #5fcbc4">TẤT CẢ SÁCH </a>' . DS . '<a href="' . URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'list', ['cid' => $categoryID], "$categoryNameURL-$categoryID.html") . '" class="mx-1" style="color: #5fcbc4"> ' . $categoryName . ' </a>' . DS . '<span class="mx-1"> ' . $bookName . '</span>';
		}
	}

	public function listAction()
	{
		$title = (isset($this->_arrParam['cid'])) ? $this->_model->singleItem($this->_arrParam, 'getCategoryName')['name'] . ' | ' . 'BookStore' : 'Tất cả sách | BookStore';
		$this->_view->setTitle($title);
		@$totalItems = $this->_model->countItem($this->_arrParam);
		$this->_view->totalItems = $totalItems['total'];

		// Pagination
		$configPagination = ['totalItemsPerPage'	=> 12, 'pageRange' => 3];
		$this->setPagination($configPagination);
		@$this->_view->pagination	= new Pagination($totalItems['total'], $this->_pagination);

		$this->_view->listCategories 	= $this->_model->listItems($this->_arrParam, 'listCategories');
		$this->_view->listBooks 		= $this->_model->listItems($this->_arrParam, 'listBooks')['list'];
		$this->_view->totalItemsPerPage	= $this->_model->listItems($this->_arrParam, 'listBooks')['resultshowItems'];
		$this->_view->listItemsSpecial 	= $this->_model->listItems($this->_arrParam, 'bookSpecial');
		$this->_view->render('book/list', true);
	}

	public function itemAction()
	{
		$title = $this->_model->singleItem($this->_arrParam, 'getBookName')['book_name'];
		$this->_view->setTitle($title . ' | BookStore');
		$this->_view->infoItem 			= $this->_model->singleItem($this->_arrParam, 'infoItem');
		$this->_view->listItemsSpecial 	= $this->_model->listItems($this->_arrParam, 'bookSpecial');
		$this->_view->listItemsNew 		= $this->_model->listItems($this->_arrParam, 'bookNew');
		$this->_view->listItemsRelate 	= $this->_model->listItems($this->_arrParam, 'listRelate');
		$this->_view->listComment		= $this->_model->listItems($this->_arrParam, 'comment');
		$this->_view->render('book/item', true);
	}

	public function ajaxLoadInfoAction()
	{
		$result = $this->_model->singleItem($this->_arrParam, 'ajaxModalView');
		echo json_encode($result);
	}

	public function commentAction()
	{
		$result = $this->_model->comment($this->_arrParam);
		echo json_encode($result);
	}

	public function loadCommentAction()
	{
		$result = $this->_model->listItems($this->_arrParam, 'comment');
		echo json_encode($result);
	}
}
