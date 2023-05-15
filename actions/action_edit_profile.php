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

  $db = getDatabaseConnection();

  $user = User::checkUser($db, $session->getId());

  if ($user && null !== htmlspecialchars($_POST['name'])) {
    $newName = filter_var($_POST['name'], FILTER_SANITIZE_STRING); // filtra e valida o valor enviado pelo usuário
    if (!empty($newName)) {
      $user->name = $newName;
      
      $user->changeName($db);

      $session->setName($user->name);
    }
}

  if ($user && null !== htmlspecialchars($_POST['email'])) {
    $newEmail = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    if (!empty($newEmail)) {
    $user->email = $newEmail;
    
    $user->changeEmail($db);

    $session->setEmail($user->name);
  }
}

  if ($user && null !==htmlspecialchars($_POST['password'])) {
    $newPwd = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    if (!empty($newPwd)) {
    $user->pwd = $newPwd;
    
    $user->changePwd($db);

    $session->setPwd($user->pwd);
  }
  }

  if ($user && null !==(htmlspecialchars($_POST['username']))) {
    $newUsername = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    if (!empty($newUsername)) {
    $user->username = $newUsername;
    
    $user->changeUsername($db);

    $session->setUsername($user->username);
  }
}

  header('Location: ../pages/edit_profile.php');
?>