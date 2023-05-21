<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  if ($_SESSION['csrf'] !== $_POST['csrf']) {

    $session->addMessage('hacker','Tentativa de csrf');
    header('Location: ../pages/edit_profile.php');
    exit();
  }

  if (!$session->isLoggedIn()) die(header('Location: ../pages/login_page.php'));

  require_once(__DIR__ . '/../Database/connection.php');
  require_once(__DIR__ . '/../Database/user.class.php');
  require_once(__DIR__ . '/../Database/ticket.class.php');

  $db = getDatabaseConnection();
  $ticket_id = $_GET['id'];
  $ticket = Ticket::getTicketById($ticket_id, $db);

  if ($ticket && isset($_POST['id_department'])) {
    $newDepartment = filter_var($_POST['id_department'], FILTER_VALIDATE_INT);;
    if (!empty($newDepartment)) {

        $ticket->id_department = $newDepartment;
        $ticket->saveDepartment($db);
    
        $session->addMessage('success', 'Departamento do ticket atualizado');
        header('Location: ../pages/detailsTicket.php?id='.urlencode($ticket_id));
    } else {
    $session->addMessage('error', 'Ticket não encontrado');
    header('Location: ../pages/agentsPage.php');
    }
  }

  if ($ticket && isset($_POST['id_status'])) {
    $newStatus = filter_var($_POST['id_status'], FILTER_VALIDATE_INT);
    if (!empty($newStatus)) {

        $ticket->id_status = $newStatus;
        $ticket->saveStatus($db);
    
        $session->addMessage('success', 'Estado do ticket atualizado');
        header('Location: ../pages/detailsTicket.php?id='.urlencode($ticket_id));
    } else {
    $session->addMessage('error', 'Ticket não encontrado');
    header('Location: ../pages/agentsPage.php');
    }
    }

    if ($ticket && isset($_POST['id_assigned_agent'])) {
        $newAgent = filter_var($_POST['id_assigned_agent'], FILTER_VALIDATE_INT);

        if (!empty($newAgent)) {
    
            $ticket->id_assigned_agent = $newAgent;
            $ticket->saveAgent($db);
        
            $session->addMessage('success', 'Estado do ticket atualizado');
            header('Location: ../pages/detailsTicket.php?id='.urlencode($ticket_id));
        } else {
            $session->addMessage('error', 'Ticket não encontrado');
            header('Location: ../pages/agentsPage.php');
        }
    }
?>