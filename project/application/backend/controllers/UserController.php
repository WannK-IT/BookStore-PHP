<?php
class UserController extends Controller
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
		$this->_view->setTitle('List User');
		$this->_view->_title = ('User :: List');
		$totalItems = $this->_model->countItem($this->_arrParam, ['task' => 'count-status']);
		$this->_view->countStatus = $totalItems;

		// Pagination
		$configPagination = ['totalItemsPerPage'	=> 5, 'pageRange' => 3];
		$this->setPagination($configPagination);
		@$this->_view->pagination	= new Pagination($totalItems['all'], $this->_pagination);
		$this->_view->list = $this->_model->listItems($this->_arrParam);
		$this->_view->listGroup = $this->_model->listGroup();
		$this->_view->render('user/index', true);
	}

	// Change single status item
	public function changeStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam);
		echo json_encode($result);
	}

	// Delete single & multi items
	public function deleteAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		$this->redirect('backend', 'user', 'index');
	}

	// Active multi items
	public function activeAction()
	{
		$this->_model->statusItem($this->_arrParam);
		$this->redirect('backend', 'user', 'index');
	}

	// Inactive multi items
	public function inactiveAction()
	{
		$this->_model->statusItem($this->_arrParam);
		$this->redirect('backend', 'user', 'index');
	}

	public function formAction()
	{
		$this->_view->_title 	= ('User :: Add');
		$this->_view->listGroup = $this->_model->listGroup();

		// nếu tồn tại id thì in ra infoItem
		if (!empty($this->_arrParam['eid'])) {
			$infoItem 	= $this->_model->singleItem($this->_arrParam['eid']);
			if (!empty($infoItem)) {
				$this->_view->results 	= $infoItem;
				$this->_view->_title 	= ('User :: Edit');
			}
		}

		if (!empty($this->_arrParam['form'])) {
			$source = [
				'username' 	=> $this->_arrParam['form']['username'],
				'password' 	=> md5($this->_arrParam['form']['password']),
				'email' 	=> $this->_arrParam['form']['email'],
				'fullname' 	=> $this->_arrParam['form']['fullname'],
				'status' 	=> $this->_arrParam['form']['status'],
				'group_id' 	=> $this->_arrParam['form']['group_id']
			];
			$validate = new Validate($source);
			$validate->addRule('username', 'string', ['min' => 5, 'max' => 50])
					->addRule('password', 'password')
					->addRule('email', 'email')
					->addRule('fullname', 'string', ['min' => 5, 'max' => 50])
					->addRule('status', 'status')
					->addRule('group_id', 'group');
			$validate->run();
			$this->_view->results 	 = $validate->getResult();
			$params 				 = $validate->getResult();

			// kiểm tra hợp lệ
			if (!$validate->isValid()) {
				$this->_view->errors = $validate->showErrors();
			} else {

				// nếu tồn tại biến url task = edit thì sẽ update dữ liệu, nếu không thì thêm dữ liệu
				if ($this->_arrParam['task'] == 'edit') {
					$this->_model->formHandle($params, $this->_arrParam, $option = 'edit');
					Session::set('messageUser', 'Cập nhật dữ liệu thành công');
				} else {
					$this->_model->formHandle($params, $this->_arrParam, $option = 'add');
					Session::set('messageUser', 'Thêm dữ liệu thành công');
				}
				$this->redirect('backend', 'user', 'index');
				ob_end_flush();
			}
		}
		$this->_view->render('user/form', true);
	}

	public function changePasswordAction(){
		$this->_view->_title 	= ('User :: Change Password');
		$this->_view->listItem 	= $this->_model->singleItem($this->_arrParam['id']);

		if(isset($this->_arrParam['changePassword'])){
			$this->_model->updatePassword($this->_arrParam['form']);
			Session::set('messageUser', 'Cập nhật mật khẩu thành công !');
			$this->redirect('backend', 'user', 'index');
		}
		$this->_view->render('user/changePassword', true);
	}

	public function changeGroupUserAction(){
		$result = $this->_model->changeGroupUser($this->_arrParam['id'], $this->_arrParam['idSelected']);
		echo json_encode($result);
	}

}
