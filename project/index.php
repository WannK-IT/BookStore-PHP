<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once 'define.php';
spl_autoload_register(function ($class_name) {
	require_once LIBRARY_PATH . "{$class_name}.php";
});
Session::init();

$bootstrap = new Bootstrap();
$bootstrap->init();
?>
