<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../database/session.php');
  $session = new Session();

  if (!$session->isLoggedIn()) die(header('Location: /'));

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');

  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId());

  if ($user) {
    $user->name = $_POST['name'];
    
    $user->save($db);

    $session->setName($user->name());
  }

  if ($user) {
    $user->email = $_POST['email'];

    $user->save($db);

    $session->setEmail($user->email());
  }

  if ($user) {
    $user->username = $_POST['username'];
    
    $user->save($db);

    $session->setUsername($user->username());
  }

  if ($user) {
    $user->username = $_POST['username'];

    if ($_POST['palavra-passe']) {
        $user->password = password_hash($_POST['palavra-passe'], PASSWORD_DEFAULT);
    }
    
    $user->save($db);

    $session->setName($user->name());
    $session->setEmail($user->email());
    $session->setPassword($user->password());
    $session->setUsername($user->username());
  }

  header('Location: ../pages/home_page.php');
?>