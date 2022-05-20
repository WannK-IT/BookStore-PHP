<?php 
class URL{
    public static function createLink($module, $controller, $action, $params = null){
        $linkParams = '';
        if(!empty($params)){
            foreach ($params as $key => $value) {
                $linkParams .= "&{$key}={$value }";
            }
        }
        return sprintf('index.php?module=%s&controller=%s&action=%s%s', $module, $controller, $action, $linkParams);
    }

    public static function direct($module = 'backend', $controller = 'group', $action = 'index'){
		header("location: index.php?module=$module&controller=$controller&action=$action");
		exit();
	}
}
