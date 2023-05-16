<?php
    require_once(__DIR__ . "/../conf.php");

    require_once(__DIR__ .'/../utils/session.php');

    
    require_once(__DIR__ . '/../Database/connection.php'); 
    require_once(__DIR__ . '/../Database/user.class.php');
    require_once(__DIR__ . '/../Database/ticket.class.php');
      
    require_once(__DIR__ . '/../templates/newTicket.tpl.php'); 
    require_once(__DIR__ . '/../templates/common.tpl.php');
    
    $session = new Session();

    if ($_SESSION['csrf'] !== $_POST['csrf']) {

        $session->addMessage('hacker','Tentativa de csrf');
        header('Location: ../index.php');
        exit();
    }

    $db = getDatabaseConnection();
    $user = User::checkUser($db, $session->getId());

    Ticket::addTicket(htmlspecialchars($_POST['id_user']), htmlspecialchars($_POST['the_subject']), htmlspecialchars($_POST['ticket_date']), htmlspecialchars($_POST['id_department']), 1 , 1, htmlspecialchars($_POST['message']), htmlspecialchars($_POST['id_status']), $db);
        header('Location: ../index.php');
    
?>