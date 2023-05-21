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
  require_once(__DIR__ . '/../Database/agent.class.php');

  $db = getDatabaseConnection();


    if (isset($_POST['id_user'], $_POST['category'])) {
        $id_user = $_POST['id_user'];
        $new_category = $_POST['category'];

        // Chame a função changeCategory para alterar a categoria
        User::changeCategory($db, $id_user, $new_category);

        $session->addMessage('success', 'Departamento do ticket atualizado');
        header('Location: ../pages/adminPage.php');
    }     else {
        $session->addMessage('error', 'Ticket não encontrado');
        header('Location: ../pages/adminPage.php');
    }

    if (isset($_POST['id_agent'], $_POST['id_department'])) {
        $id_agent = $_POST['id_agent'];
        $new_department = $_POST['id_department'];
    
        // Chame a função changeCategory para alterar a categoria
        Agent::changeDepartment($db, $id_user, $new_department);
    
        $session->addMessage('success', 'Departamento do ticket atualizado');
        header('Location: ../pages/adminPage.php');
    } else {
        $session->addMessage('error', 'Ticket não encontrado');
        header('Location: ../pages/adminPage.php');
    }



?>