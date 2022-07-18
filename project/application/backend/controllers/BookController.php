<?php
class BookController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		Session::init();
		Authentication::checkLogin();
		$this->_view->getFullName = $this->_model->getFullName($this->_arrParam);
	}	

	public function indexAction()
	{
		$this->_view->setTitle('Book :: List');
		$this->_view->_title = ('Book :: List');
		$countStatus 	= $this->_model->countItem($this->_arrParam, ['task' => 'count-status']);
		$totalItems 	= @$countStatus[$this->_arrParam['status'] ?? 'all'];
		$this->_view->countStatus = $countStatus;

		// Pagination
		$configPagination = ['totalItemsPerPage'	=> 5, 'pageRange' => 3];
		$this->setPagination($configPagination);
		@$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);

		$this->_view->list = $this->_model->listItems($this->_arrParam);
		$this->_view->listCategory = $this->_model->listCategory();
		$this->_view->render('book/index', true);
	}


	// Change single status item
	public function changeStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam);
		echo json_encode($result);
	}

	// Change single special item
	public function changeSpecialAction()
	{
		$result = $this->_model->changeSpecial($this->_arrParam);
		echo json_encode($result);
	}

	// Delete single & multi items
	public function deleteAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		$this->redirect('backend', 'book', 'index');
	}

	// Active multi items
	public function activeAction()
	{
		$this->_model->statusItem($this->_arrParam);
		$this->redirect('backend', 'book', 'index');
	}

	// Inactive multi items
	public function inactiveAction()
	{
		$this->_model->statusItem($this->_arrParam);
		$this->redirect('backend', 'book', 'index');
	}

	public function formAction()
	{
		$this->_view->_title = ('Book :: Add');
		$this->_view->listCategory = $this->_model->listCategory();
		if (!empty($_FILES)) $this->_arrParam['form']['picture'] = $_FILES['picture'];

		// nếu tồn tại id thì in ra infoItem
		if (!empty($this->_arrParam['eid'])) {
			$infoItem = $this->_model->singleItem($this->_arrParam['eid']);
			if (!empty($infoItem)) {
				$this->_view->results = $infoItem;
				$this->_view->_title = ('Book :: Edit');
			}
		}

		if (!empty($this->_arrParam['form']['token'])) {
			$source = [
				'name' 			=> $this->_arrParam['form']['name'],
				'description' 	=> $this->_arrParam['form']['description'],
				'price' 		=> $this->_arrParam['form']['price'],
				'sale_off' 		=> $this->_arrParam['form']['sale_off'],
				'ordering' 		=> $this->_arrParam['form']['ordering'],
				'category_id' 	=> $this->_arrParam['form']['category_id'],
				'status' 		=> $this->_arrParam['form']['status'],
				'special' 		=> $this->_arrParam['form']['special'],
				'picture'		=> $this->_arrParam['form']['picture']
			];
			$validate = new Validate($source);
			$validate->addRule('name', 'string', ['min' => 5, 'max' => 200])
					->addRule('description', 'string', ['min' => 5, 'max' => 100000])
					->addRule('price', 'int', ['min' => 1000, 'max' => 10000000])
					->addRule('sale_off', 'int2', ['min' => 0, 'max' => 100])
					->addRule('ordering', 'int', ['min' => 1, 'max' => 10000])
					->addRule('category_id', 'group')
					->addRule('status', 'status')
					->addRule('special', 'status')
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
					$this->_model->formHandle($params, $this->_arrParam, $option = 'edit');
					Session::set('message', 'Cập nhật dữ liệu thành công');
				} else { 		
					$this->_model->formHandle($params, $this->_arrParam, $option = 'add');
					Session::set('message', 'Thêm dữ liệu thành công');
				}
				$this->redirect('backend', 'book', 'index');
				ob_end_flush();
			}
		}
		$this->_view->render('book/form', true);
	}

	public function changeOrderingAction()
	{
		$this->_model->changeOrdering($this->_arrParam);
	}

	public function changeGroupCategoryAction(){
		$result = $this->_model->changeGroupCategory($this->_arrParam['id'], $this->_arrParam['idSelected']);
		echo json_encode($result);
	}
}
