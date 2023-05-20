<?php
    require_once(__DIR__ . "/../conf.php");
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ . '/../Database/connection.php');
    require_once(__DIR__ . '/../Database/user.class.php');
    require_once(__DIR__ . '/../Database/ticket.class.php');
    
    $session = new Session();
    if (session_status() == PHP_SESSION_NONE ){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) 
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
    }

    $db = getDatabaseConnection();
    $ticket_id = htmlspecialchars($_POST['ticket_id']);

    Ticket::addMessage(htmlspecialchars($_POST['ticket_id']), htmlspecialchars($_POST['message_text']),htmlspecialchars($_POST['name']), $db);
        header('Location: ../pages/detailsTicket.php?id=' .urlencode($ticket_id));
    
?>