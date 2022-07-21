<?php
	
	// ====================== PATHS ===========================
	define ('DS'					, '/');
	define ('ROOT_PATH'				, dirname(__FILE__));						
	define ('LIBRARY_PATH'			, ROOT_PATH . DS . 'libs' . DS);			
	define ('PUBLIC_PATH'			, ROOT_PATH . DS . 'public' . DS);									
	define ('APPLICATION_PATH'		, ROOT_PATH . DS . 'application' . DS);								
	define ('TEMPLATE_PATH'			, PUBLIC_PATH . 'template' . DS);													
	define ('EXTEND_PATH'			, LIBRARY_PATH . 'extends' . DS);													
	define ('UPLOAD_PATH'			, PUBLIC_PATH . 'uploads' . DS);							
	define ('UPLOAD_BOOK_PATH'		, UPLOAD_PATH . 'book' . DS);							
	define ('UPLOAD_CATEGORY_PATH'	, UPLOAD_PATH . 'category' . DS);							
	
	define	('ROOT_URL'				, DS . 'php14_QuangNguyen/project'. DS); 
	define	('APPLICATION_URL'		, ROOT_URL . 'application' . DS);
	define	('PUBLIC_URL'			, ROOT_URL . 'public' . DS);
	define	('TEMPLATE_URL'			, PUBLIC_URL . 'template' . DS);
	define	('UPLOAD_URL'			, PUBLIC_URL . 'uploads' . DS);
	define	('UPLOAD_BOOK_URL'		, UPLOAD_URL . 'book' . DS);
	define	('UPLOAD_CATEGORY_URL'	, UPLOAD_URL . 'category' . DS);
	
	define	('DEFAULT_MODULE'		, 'default');
	define	('DEFAULT_CONTROLLER'	, 'home');
	define	('DEFAULT_ACTION'		, 'index');

	// ====================== DATABASE ===========================
	define ('DB_HOST'				, $_SERVER['SERVER_NAME']);
	define ('DB_USER'				, 'root');						
	define ('DB_PASS'				, '');						
	define ('DB_NAME'				, 'projectfinal');	
						
	define ('DB_TBL_GROUP'			, 'group');						
	define ('DB_TBL_USER'			, 'user');						
	define ('DB_TBL_CATEGORY'		, 'category');						
	define ('DB_TBL_BOOK'			, 'book');						
	define ('DB_TBL_CART'			, 'cart');						
