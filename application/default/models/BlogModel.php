<?php
class BlogModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_BLOG);
	}

	public function listItems($arrParams, $option)
	{
		switch ($option) {
			case 'blog':
				$query[] = "SELECT `id`, `title`, `content`, `posted_by`, `posted_date`, `picture`";
				$query[] = "FROM `" . DB_TBL_BLOG . "`";
				$query[] = "WHERE `status` = 'active'";
				$query[] = "AND `ordering` != '1'";
				
				// search
				$query[] = (!empty($arrParams['search_blog'])) ? "AND `title` LIKE '%" . trim($arrParams['search_blog']) . "%'" : "";

				$query[] = "ORDER BY `ordering`";

				// pagination
				$pagination			= $arrParams['pagination'];
				$totalItemsPerPage	= $pagination['totalItemsPerPage'];
				if ($totalItemsPerPage > 0) {
					$position		= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
					$query[]		= "LIMIT $position, $totalItemsPerPage";
				}
				$query 		= implode(' ', $query);
				$result  	= $this->listRecord($query);
				
				break;

			case 'blogNewest':
				$excludeIDs = (!empty($arrParams['id'])) ? "AND `id` NOT IN ('" . $arrParams['id'] . "')" : "";
				$query[] 	= "SELECT `id`, `title`, `picture`";
				$query[] 	= "FROM `" . DB_TBL_BLOG . "`";
				$query[] 	= "WHERE `status` = 'active'";
				$query[] 	= "AND `ordering` != '1' $excludeIDs";
				$query[] 	= "ORDER BY `posted_date` DESC LIMIT 5";
				$query 		= implode(' ', $query);
				$result  	= $this->listRecord($query);
				break;

			case 'blogRelated':
				$excludeIDs = (!empty($arrParams['id'])) ? "AND `id` NOT IN ('" . $arrParams['id'] . "')" : "";
				$query[] 	= "SELECT `id`, `title`, `picture`";
				$query[] 	= "FROM `" . DB_TBL_BLOG . "`";
				$query[] 	= "WHERE `status` = 'active'";
				$query[] 	= "AND `ordering` != '1' $excludeIDs";
				$query[] 	= "ORDER BY RAND() LIMIT 5";
				$query 		= implode(' ', $query);
				$result  	= $this->listRecord($query);
				break;
		}


		return $result;
	}

	public function countItem($arrParams)
	{
		$query[] = "SELECT COUNT(`id`) AS 'total'";
		$query[] = "FROM `" . $this->table . "`";
		$query[] = "WHERE `status` = 'active' AND `ordering` != '1'";

		// search
		$query[] = (!empty($arrParams['search_blog'])) ? "AND `title` LIKE '%" . trim($arrParams['search_blog']) . "%'" : "";

		$result  = implode(' ', $query);
		return $this->singleRecord($result);
	}

	public function singleItem($arrParams)
	{
		$query[] = "SELECT `id`, `title`, `content`, `posted_by`, `posted_date`";
		$query[] = "FROM `" . $this->table . "`";
		$query[] = "WHERE `status` = 'active' AND `id` = '" . $arrParams['id'] . "'";
		$query	 = implode(" ", $query);
		$result  = $this->singleRecord($query);
		return $result;
	}
}
