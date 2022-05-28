<?php 
class Authentication{
    public static function checkLogin(){
        if(!isset($_SESSION['login']['idUser'])){
            URL::direct('backend', 'account', 'login');
        }
    }

    public static function checkLoginDefault(){
        if(!isset($_SESSION['loginDefault']['idUser'])){
            URL::direct('default', 'account', 'login');
        }
    }
}
?>