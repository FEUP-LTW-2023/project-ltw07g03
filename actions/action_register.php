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

    if ($_SESSION['csrf'] !== $_POST['csrf']) {

        $session->addMessage('hacker','Tentativa de csrf');
        header('Location: ../pages/edit_profile.php');
        exit();
    }

    $db = getDatabaseConnection();

    User::addUser(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['username']), htmlspecialchars($_POST['pwd']), htmlspecialchars($_POST['email']), $db);
        header('Location: ../pages/edit_profile.php');
    
?>