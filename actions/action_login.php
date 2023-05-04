<?php
    include_once(__DIR__ . '/../conf.php');
    if (session_status() == PHP_SESSION_NONE){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start();
        if (isset($_SESSION['csrf'])){
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
        }
    }

    include_once(__DIR__ . '/../Database/connection.php');
    include_once(__DIR__ . '/../Database/user.class.php');

    if (checkUser($_POST['username'], $_POST['pwd'])){
        $_SESSION['username'] = $_POST['username'];

        header('Location: ../index.php')
    }
    else{
        header('Location: ../HomePage/home_page.php')
    }
?>