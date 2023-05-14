<?php
    
    include_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../Database/connection.php');

    if (session_status() == PHP_SESSION_NONE){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start();
        if (isset($_SESSION['csrf'])){
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
        }
    }
    
    $session = new Session();
    $db = getDatabaseConnection();
    include_once(__DIR__ . '/../Database/connection.php');
    include_once(__DIR__ . '/../Database/user.class.php');
    
    if (User::checkUser($_POST['username'], $_POST['pwd'],$db)){
        $_SESSION['username'] = $_POST['username'];
        header('Location: ../index.php');
    }
    else{
        $session->addMessage('error', 'O utlizador ou palavra-passe estão errados.');
        header('Location: ../pages/login_page.php');
    }
?>