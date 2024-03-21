<?php
class SessionHelper{
    public static function isAdmin(){
        return (isset($_SESSION['role']) && $_SESSION['role']=='admin');
    }
    public static function isUser(){
        return (isset($_SESSION['role']) && $_SESSION['role']=='user');
    }
    public static function isNom(){
        return (isset($_SESSION['REQUEST_METHOD']) && $_SESSION['role'] == 'bold');
    }
    //kiem tra đã đăng nhập chưa?
    public static function isLoggedIn(){
        return isset($_SESSION['username']);
    }
}