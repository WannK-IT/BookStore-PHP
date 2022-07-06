<?php
class CategoryModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_CATEGORY);
	}

	public function listItems($option)
	{
		if ($option == 'categoryNavbar') {
			$query[] = "SELECT `id`, `name`";
			$query[] = "FROM `{$this->table}`";
			$query[] = "WHERE `status` = 'active'";
			$query[] = "ORDER BY `ordering`";
		}elseif($option == 'category'){
			$query[] = "SELECT `id`, `name`, `picture`";
			$query[] = "FROM `{$this->table}`";
			$query[] = "WHERE `status` = 'active'";
			$query[] = "ORDER BY `ordering`";
		}

		$result = implode(' ', $query);
		return $this->listRecord($result);
	}
}
