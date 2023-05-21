<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ .'/../Database/connection.php');
  require_once(__DIR__ . '/../Database/user.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/faqPage.tpl.php');
  require_once(__DIR__ . '/../templates/clientsPage.tpl.php');

  $db = getDatabaseConnection();

  $user = User::checkUser($db, $_SESSION['id']);

  drawHeaderClientPage($user);
  drawFAQPage();
  drawFooter();
?>