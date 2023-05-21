<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../Database/connection.php');
  require_once(__DIR__ . '/../Database/user.class.php');
  require_once(__DIR__ . '/../Database/ticket.class.php');
  require_once(__DIR__ . '/../Database/agent.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/clientsPage.tpl.php');
  require_once(__DIR__ . '/../templates/agentsPage.tpl.php');

  $db = getDatabaseConnection();

  $user = User::checkUser($db, $_SESSION['id']);
  $userId = $user->id_user;
  $agent = Agent::checkAgent($db, $userId);
  $departmentId = $agent->id_department;
  $tickets = Ticket::getDepartamentTickets($departmentId, $db);

  drawHeaderClientPage($user);
  drawAgentPage($user, $tickets, $db);
  drawFooter(); 

  $filters = [
    'assigned_agent' => $_SESSION['id'], 
    'status' => 'aberto', 'assigned', 'fechado',
    'priority' => 'muito urgente', 'urgente', 'alta', 'normal', 'baixa' 
  ];

$tickets = Agent::getDepartmentTickets($departmentId, $db, $filters);
?>