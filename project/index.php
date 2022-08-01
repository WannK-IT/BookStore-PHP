<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once 'define.php';
spl_autoload_register(function ($class_name) {
	$fileName = LIBRARY_PATH . "{$class_name}.php";
	if(file_exists($fileName)) require_once $fileName;
});
Session::init();
header('Content-type: text/html; charset=utf-8');
$bootstrap = new Bootstrap();
$bootstrap->init();
?>
