<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../Database/connection.php');
  require_once(__DIR__ . '/../Database/user.class.php');
  require_once(__DIR__ . '/../Database/ticket.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/detailsTicket.tpl.php');
  require_once(__DIR__ . '/../templates/messageTickets.tpl.php');
  require_once(__DIR__ . '/../templates/clientsPage.tpl.php');

  $db = getDatabaseConnection();
  $user = User::checkUser($db, $_SESSION['id']);
  $name = $user->name;
  $ticket_id = $_GET['id'];
  $messages = Ticket::getMessageTicket($ticket_id, $db);

  drawHeaderClientPage($user);
  drawDetailsTicket($ticket_id, $db);
  drawMessageTickets($name, $ticket_id, $messages, $db);
  drawFooter(); 
?>