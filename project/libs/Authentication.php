<?php 
class Authentication{
    public static function checkLogin(){
        if(!isset($_SESSION['loginSuccess'])){
            URL::direct('backend', 'account', 'login');
        }
    }
}
?>