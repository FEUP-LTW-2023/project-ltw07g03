<?php
    require_once(__DIR__ . "/../conf.php");
    require_once(__DIR__ .'/../utils/session.php');

    $session = new Session();

    if ($_SESSION['csrf'] !== $_POST['csrf']) {

        $session->addMessage('hacker','Tentativa de csrf');
        header('Location: ../index.php');
        exit();
    }

    if (!$session->isLoggedIn()) die(header('Location: ../pages/login_page.php'));

    require_once(__DIR__ . '/../Database/connection.php'); 
    require_once(__DIR__ . '/../Database/user.class.php');
    require_once(__DIR__ . '/../Database/ticket.class.php');

    $db = getDatabaseConnection();
    $user = User::checkUser($db, $session->getId());
    $departmentId = (int) $_POST['id_department'];

    $assignedAgentId = Ticket::getAssignedAgent($departmentId, $db);

    if ($assignedAgentId == 0) {
        $session->addMessage('fail', 'Não há agentes disponíveis para o departamento selecionado.');
            header('Location: ../pages/newTicket.php');
    } else {
        Ticket::addTicket($user->id_user, htmlspecialchars($_POST['the_subject']), htmlspecialchars($_POST['id_hashtag']), htmlspecialchars($_POST['id_department']), $assignedAgentId, 1, htmlspecialchars($_POST['message']), htmlspecialchars($_POST['id_priority']), $db);
        header('Location: ../pages/clientsPage.php');
    }

?>