<?php 
  declare(strict_types = 1); 

   require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawEditProfile(Session $session) { ?>

<div class="container">
    <h1>Editar Perfil</h1>
    <section class="user-info">
        <div><span class="low_contrast">Nome Completo</span></div>
        <p class="p-edit"><span id="name-text" class="high_contrast"> <?= $name ?> </span><button class="edit-btn" data-field="nome">Editar</button></p>
        <div><span class="low_contrast">E-mail</span></div> 
        <p class="p-edit"><span id="email-text" class="high_contrast"><?= $email ?></span><button class="edit-btn" data-field="e-mail">Editar</button></p>
        <div><span class="low_contrast">Palavra-passe</span></div>
        <p class="p-edit"><span id="password-text" class="high_contrast"> k </span><button class="edit-btn" data-field="palavra-passe">Editar</button></p>
        <!-- <?= str_repeat('*', strlen($pwd)) ?> -->
        <div><span class="low_contrast">Utilizador</span></div> 
        <p class="p-edit"><span id="username-text" class="high_contrast"><?= $username ?></span><button class="edit-btn" data-field="utilizador">Editar</button></p>
    </section>
    <div class="edit-popup" id="edit-popup">
        <div class="edit-popup-content">
            <h2>Editar <span id="field-name"></span></h2>
            <button class="close-btn">&times;</button>
            <form method="post" action="action_edit_profile.php" id="edit-form">
                <input type="text" id="edit-input" name="edit-input"><br>
                <?php if (field-name == password-test) : ?>
                    <label>Confirmar palavra-passe:</label>
                    <input type="password" name="confirm-password"><br>
                <?php endif; ?>
                <input type="submit" value="Salvar">
            </form>
        </div>
    </div>
</div>

<?php } ?>
