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
}
?>