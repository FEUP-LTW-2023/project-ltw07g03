<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../Database/connection.php');

  require_once(__DIR__ . '/../Database/user.class.php');
  require_once(__DIR__ . '/../Database/ticket.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/editTicket.tpl.php');
  require_once(__DIR__ . '/../templates/clientsPage.tpl.php');

  $db = getDatabaseConnection();
  $user = User::checkUser($db, $_SESSION['id']);
  $ticket_id = $_GET['id'];
  $ticket = Ticket::getTicketById($ticket_id, $db);
  $agents = Agent::getAgentsByDepartment($ticket->id_department, $db);

  drawHeaderClientPage($user);
  drawEditTicket($ticket_id, $session, $agents, $db);
//   drawHistoryTicket($ticket_id, $db);
  drawFooter(); 
?>