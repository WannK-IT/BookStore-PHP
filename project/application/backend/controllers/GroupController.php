<?php
class GroupController extends Controller
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
	}

	public function indexAction()
	{
		$this->_view->_title = ('Group :: List');
		$totalItems = $this->_model->countItem($this->_arrParam, ['task' => 'count-status']);
		$this->_view->countStatus = $totalItems;

		// Pagination
		$configPagination = ['totalItemsPerPage'	=> 5, 'pageRange' => 3];
		$this->setPagination($configPagination);
		@$this->_view->pagination	= new Pagination($totalItems['all'], $this->_pagination);

		$this->_view->list = $this->_model->listItems($this->_arrParam);
		$this->_view->render('group/index', true);
	}

	// Change single status item
	public function changeStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam);
		echo json_encode($result);
	}

	// Change group acp
	public function changeGroupACPAction()
	{
		$result = $this->_model->changeGroupACP($this->_arrParam);
		echo json_encode($result);
	}

	// Delete single & multi items
	public function deleteAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		$this->redirect('backend', 'group', 'index');
	}

	// Active multi items
	public function activeAction()
	{
		$this->_model->statusItem($this->_arrParam);
		$this->redirect('backend', 'group', 'index');
	}

	// Inactive multi items
	public function inactiveAction()
	{
		$this->_model->statusItem($this->_arrParam);
		$this->redirect('backend', 'group', 'index');
	}

	public function formAction()
	{
		$this->_view->_title = ('Group :: Add');
		// nếu tồn tại id thì in ra infoItem
		if (!empty($this->_arrParam['eid'])) {
			$infoItem = $this->_model->singleItem($this->_arrParam['eid']);
			if (!empty($infoItem)) {
				$this->_view->results = $infoItem;
				$this->_view->_title = ('Group :: Edit');
			}
		}

		if (!empty($this->_arrParam['form'])) {
			$source = [
				'name' => $this->_arrParam['form']['name'],
				'status' => $this->_arrParam['form']['status'],
				'group_acp' => $this->_arrParam['form']['group_acp']
			];
			$validate = new Validate($source);
			$validate->addRule('name', 'string', ['min' => 5, 'max' => 50])
					->addRule('status', 'status')
					->addRule('group_acp', 'group_acp');
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
				$this->redirect('backend', 'group', 'index');
				ob_end_flush();
			}
		}
		$this->_view->render('group/form', true);
	}
}
