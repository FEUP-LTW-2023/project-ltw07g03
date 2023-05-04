<?php
    include_once(__DIR__ . "/../conf.php");

    if (!preg_match("/[\w]{3,20}/", $_POST['username']) ||
        !preg_match("/^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/", $_POST['name']) || 
        !preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&\-_])[A-Za-z\d@$!%*#?&\-_]{8,}$/", $_POST['password']))
        return;

    if (session_status() == PHP_SESSION_NONE ){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) 
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
    }

    include_once(ROOT . '/Database/connection.php'); 
    include_once(ROOT . '/Database/user.class.php');     

    if (!checkUsername($_POST['username'])) {
        addUser($_POST['name'], $_POST['username'], $_POST['+wd']);
        header('Location: ../pages/Login_page.php');
    }
?>