<?php 
    declare(strict_types = 1); 

    require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/../Database/user.class.php');
?>

<?php function drawEditProfile(User $user) { ?>


<div class="container">
    <h1>Editar Perfil</h1>
    <form method="post" action="/actions/action_edit_profile.php" id="edit-form">
        <div><span class="low_contrast">Nome Completo</span></div>
        <input type="text" id="name" name="name" placeholder=" <?= $user->name; ?>">
        <div><span class="low_contrast">E-mail</span></div> 
        <input type="email" id="email" name="email" placeholder= <?= $user->email; ?>>
        <div><span class="low_contrast">Palavra-passe</span></div>
        <input type="password" id="password" name="password" placeholder= '********'>
        <div><span class="low_contrast">Confirmar Palavra-passe</span></div>
        <input type="password" id="password_check" name="password_check" placeholder="********" onblur="checkPasswordMatch()">
        <div><span class="low_contrast">Utilizador</span></div> 
        <input type="text" id="username" name="username" placeholder= <?= $user->username; ?>>
        <button class="edit-btn" data-field="nome">Salvar mudanças</button>
    </form>
</div>

<?php } ?>
