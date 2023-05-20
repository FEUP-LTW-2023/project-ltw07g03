<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../Database/connection.php');
  require_once(__DIR__ . '/../Database/user.class.php');
  require_once(__DIR__ . '/../Database/ticket.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/clientsPage.tpl.php');

  $db = getDatabaseConnection();

  $user = User::checkUser($db, $_SESSION['id']);
  $userId = $user->id_user;
  $tickets = Ticket::getClientTickets($userId, $db);

  drawHeaderClientPage($user);
  drawClientPage($user, $tickets, $db);
  drawFooter(); 
?>