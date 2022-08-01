<?php 
class Authentication{
    public static function checkLogin(){
        if(!isset($_SESSION['login']['idUser'])){
            URL::direct('backend', 'account', 'login');
        }
    }

    public static function checkLoginDefault(){
        $check = true;
        if(!isset($_SESSION['loginDefault']['idUser'])){
            $check = false;
        }
        return $check;
    }

    public static function checkSessionTimeout($session_timeout, $side = 'default'){
        switch($side){
            case 'default':
                if(!empty($session_timeout)){
                    if(time() >= $session_timeout){
                        Session::delete('loginDefault');
                        URL::direct('default', 'account', 'login', null, 'dang-nhap.html');
                    }
                }
                break;
            case 'backend':
                if(!empty($session_timeout)){
                    if(time() >= $session_timeout){
                        Session::delete('login');
                        URL::direct('backend', 'account', 'login', null, 'admin');
                    }
                }
                break;
        }
        
    }
}
?>