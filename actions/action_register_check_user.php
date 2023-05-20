<?php
    include_once(__DIR__ . "/../conf.php");
    
    //VOLTAR AQUI!!!!
    // if (!preg_match("/[\w]{3,20}/", $_POST['username']) ||
    //     !preg_match("/^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/", $_POST['name']) || 
    //    !preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&\-_])[A-Za-z\d@$!%*#?&\-_]{8,}$/", $_POST['password']))
    //     return;
    
    require_once(__DIR__ .'/../utils/session.php');
    include_once(ROOT . '/Database/connection.php'); 
    include_once(ROOT . '/Database/user.class.php');  
    include_once(ROOT . '/templates/register.tpl.php');  
    require_once(__DIR__ . '/../templates/common.tpl.php');

    $session = new Session();
    if (session_status() == PHP_SESSION_NONE ){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) 
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
    }

    
    $db = getDatabaseConnection();
    
    //função que confere se o usuário é unico. Se não for retorna erro. Caso seja único, chama o segundo form com parametro name e username.
    if(!User::checkUsername($_POST['username'],$db)){
        drawHeader();
        drawRegisterForm_second_step($_POST['username'],$_POST['name']);
        drawFooter();
    }

    //Colocar mensagem de erro
    else{
        $session->addMessage('double_user', 'Um utilizador com esse nome já existe.');
        header('Location: ../pages/register.php');
    
    }
?>