<?php
class CategoryModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_CATEGORY);
	}

	public function listItems($arrParams)
	{
		$query[] 	= "SELECT *";
		$query[] 	= "FROM `{$this->table}` WHERE `id` > 0";

		// filter status
		$query[] 	= (!empty($arrParams['status']) && $arrParams['status'] != 'all') ? "AND `status` = '{$arrParams['status']}'" : '';

		// filter show homepage
		$query[] 	= (!empty($arrParams['filter_homepage']) && $arrParams['filter_homepage'] != 'default') ? "AND `isShowHome` = '{$arrParams['filter_homepage']}'" : '';

		//search
		$query[] = (!empty($arrParams['search_value'])) ? "AND `name` LIKE '%" . trim($arrParams['search_value']) . "%'" : '';

		// order by
		$query[]	= "ORDER BY `ordering` ASC";

		// pagination
		$pagination			= $arrParams['pagination'];
		$totalItemsPerPage	= $pagination['totalItemsPerPage'];
		if ($totalItemsPerPage > 0) {
			$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
			$query[]	= "LIMIT $position, $totalItemsPerPage";
		}

		$query		= implode(" ", $query);
		$result		= $this->listRecord($query);
		return $result;
	}

	public function singleItem($id)
	{
		$query[] 	= "SELECT `name`, `picture`, `status`, `ordering`, `isShowHome`";
		$query[] 	= "FROM `{$this->table}`";
		$query[] 	= "WHERE `id` = '" . $id . "'";
		$query		= implode(" ", $query);

		$result		= $this->singleRecord($query);
		return $result;
	}

	public function changeStatus($arrParams)
	{
		$id = $arrParams['id'];
		$status = ($arrParams['status'] == 'inactive') ? 'active' : 'inactive';
		$query = "UPDATE `{$this->table}` SET `status` = '$status' WHERE `id` = '$id'";
		$this->query($query);

		return [$id, $status, URL::createLink($arrParams['module'], $arrParams['controller'], 'changeStatus', ['status' => $status, 'id' => $id])];
	}

	public function changeIsHomepage($arrParams)
	{
		$id = $arrParams['id'];
		$status = ($arrParams['status'] == 'no') ? 'yes' : 'no';
		$query = "UPDATE `{$this->table}` SET `isShowHome` = '$status' WHERE `id` = '$id'";
		$this->query($query);

		return [$id, $status, URL::createLink($arrParams['module'], $arrParams['controller'], 'changeIsHomepage', ['status' => $status, 'id' => $id])];
	}


	public function deleteItem($arrParams)
	{
		$ids = (!empty($arrParams['checkbox'])) ? $arrParams['checkbox'] : [$arrParams['id']];
		$newID = $this->createWhereDeleteSQL($ids);

		// delete image
		$query = "SELECT `id`, `picture` FROM `$this->table` WHERE `id` IN ($newID)";
		$arrImg = $this->listRecord($query);
		$arrImg = array_column($arrImg, 'picture', 'id');
		require_once EXTEND_PATH . 'Upload.php';
		$upload = new Upload();
		foreach ($arrImg as $value) {
			$upload->deleteFile(UPLOAD_PATH . 'category', $value);
		}

		// delete item
		$query = "DELETE FROM `$this->table` WHERE `id` IN ($newID)";
		$this->query($query);
	}

	public function statusItem($arrParams)
	{
		$ids = implode(',', $arrParams['checkbox']);
		$query = "UPDATE `{$this->table}` SET `status` = '" . $arrParams['action'] . "' WHERE `id` IN({$ids})";
		$this->query($query);
	}

	public function countItem($arrParams, $option = null)
	{
		if ($option['task'] == 'count-status') {
			$query[] = "SELECT `status`, COUNT(`id`) AS 'countStatus'";
			$query[] = "FROM `{$this->table}` WHERE `id` > 0";

			// search
			$query[] = (!empty($arrParams['search_value'])) ? "AND `name` LIKE '%" . $arrParams['search_value'] . "%'" : '';

			// filter show homepage
			$query[] = (!empty($arrParams['filter_homepage']) && $arrParams['filter_homepage'] != 'default') ? "AND `isShowHome` = '{$arrParams['filter_homepage']}'" : '';

			$query[] = "GROUP BY `status`";
			$query		= implode(" ", $query);
			$result		= $this->listRecord($query);

			if (!empty($result)) {
				foreach ($result as $value) {
					$status[] = ($value['status']);
					$count[] = $value['countStatus'];
				}
				$result = array_combine($status, $count);
				$result = ['all' => array_sum($result)] + $result;
			}
			return $result;
		}
	}

	public function formHandle($arrParams, $paramsUrl, $option)
	{
		require_once EXTEND_PATH . 'Upload.php';
		$fullName = self::getFullName();

		$upload = new Upload();
		if ($option == 'add') {
			require_once EXTEND_PATH . 'Upload.php';
			$upload = new Upload();
			$newPicture = $upload->uploadFile($arrParams['picture'], 'category');

			// $arrParams['created'] set default ở phpmyadmin
			$arrParams['created_by'] = $fullName['fullname'];
			$arrParams['created'] = date('Y-m-d H:i:s');

			$arrParams['picture'] = $newPicture;
			$this->insert([$arrParams], 'multi');
		} elseif ($option == 'edit') {

			if ($arrParams['picture']['name'] == null) {
				unset($arrParams['picture']);
			} else {
				$oldImg = self::singleItem($paramsUrl['eid']);
				$oldImg = $oldImg['picture'];
				$upload->deleteFile(UPLOAD_PATH . 'category', $oldImg);
				$newPicture = $upload->uploadFile($arrParams['picture'], 'category');
				$arrParams['picture'] = $newPicture;
			}
			$arrParams['modified_by'] = $fullName['fullname'];
			$arrParams['modified'] = date('Y-m-d H:i:s');
			$this->update($arrParams, [['id', $paramsUrl['eid']]]);
		}
	}

	public function getFullName()
	{
		$query[] 	= "SELECT `fullname`";
		$query[] 	= "FROM `user`";
		$query[] 	= "WHERE `id` = '" . $_SESSION['login']['idUser'] . "'";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);

		return $result;
	}

	public function changeOrdering($arrParams)
	{
		$query[] = "UPDATE `{$this->table}` SET `ordering` = '" . $arrParams['newValue'] . "'";
		$query[] = "WHERE `id` = '" . $arrParams['id'] . "'";
		$query = implode(" ", $query);

		$this->query($query);
	}
}
