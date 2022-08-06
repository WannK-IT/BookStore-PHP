<?php
class BlogController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		Authentication::checkLogin();

		$this->_view->getFullName = $this->_model->getFullName($this->_arrParam);
	}

	public function indexAction()
	{
		$this->_view->setTitle('Blog');
		$this->_view->_title = ('Blog :: List');

		$countStatus 	= $this->_model->countItem($this->_arrParam, ['task' => 'count-status']);
		$totalItems 	= @$countStatus[$this->_arrParam['status'] ?? 'all'];
		$this->_view->countStatus = $countStatus;

		// Pagination
		$configPagination = ['totalItemsPerPage'	=> 6, 'pageRange' => 3];
		$this->setPagination($configPagination);
		@$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);

		$this->_view->list = $this->_model->listItems($this->_arrParam);
		$this->_view->render('blog/index', true);
	}

	// Delete single & multi items
	public function deleteAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		$this->redirect('backend', 'blog', 'index');
	}

	// Change single status item
	public function changeStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam);
		echo json_encode($result);
	}

	// Active multi items
	public function activeAction()
	{
		$this->_model->statusItem($this->_arrParam);
		$this->redirect('backend', 'blog', 'index');
	}

	// Inactive multi items
	public function inactiveAction()
	{
		$this->_model->statusItem($this->_arrParam);
		$this->redirect('backend', 'blog', 'index');
	}

	public function changeOrderingAction()
	{
		$this->_model->changeOrdering($this->_arrParam);
	}
	

	public function formAction()
	{
		$this->_view->_title = ('blog :: Add');
		if (!empty($_FILES)) $this->_arrParam['form']['picture'] = $_FILES['picture'];

		// nếu tồn tại id thì in ra infoItem
		if (!empty($this->_arrParam['id'])) {
			$infoItem = $this->_model->singleItem($this->_arrParam['id']);
			if (!empty($infoItem)) {
				$this->_view->results = $infoItem;
				$this->_view->_title = ('Blog :: Edit');
			}
		}

		if (!empty($this->_arrParam['form']['token'])) {

			$source = [
				'title' 			=> $this->_arrParam['form']['title'],
				'content' 	=> $this->_arrParam['form']['content'],
				'ordering' 		=> $this->_arrParam['form']['ordering'],
				'status' 		=> $this->_arrParam['form']['status'],
				'picture'		=> $this->_arrParam['form']['picture']
			];
			$validate = new Validate($source);
			$validate->addRule('title', 'string', ['min' => 5, 'max' => 2000])
					->addRule('content', 'string', ['min' => 5, 'max' => 100000])
					->addRule('ordering', 'int', ['min' => 1, 'max' => 10000])
					->addRule('status', 'status')
					->addRule('picture', 'file', ['min' => 100, 'max' => 10000000, 'extension' => ['jpg', 'png', 'jpeg']], false);
			$validate->run();
			$this->_view->results = $validate->getResult();
			$params = $validate->getResult();

			// kiểm tra hợp lệ
			if (!$validate->isValid()) {
				$this->_view->errors  = $validate->showErrors();
			} else {

				// nếu tồn tại biến url task = edit thì sẽ update dữ liệu, nếu không thì thêm dữ liệu
				if ($this->_arrParam['task'] == 'edit') { 	
					$this->_model->formHandle($params, $this->_arrParam, 'edit');
					Session::set('messageBlog', 'Cập nhật dữ liệu thành công');
				} else { 		
					$this->_model->formHandle($params, $this->_arrParam, 'add');
					Session::set('messageBlog', 'Thêm dữ liệu thành công');
				}
				$this->redirect('backend', 'blog', 'index');
				ob_end_flush();
			}
		}
		$this->_view->render('blog/form', true);
	}


}
