<?php 
  declare(strict_types = 1); 

   require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawRegisterForm_first_step(Session $session) { ?>

	<div class="container">
        <span class="text-eyebrow">Passo 1 de 2</span>
		<h1>Criar Conta</h1>
		<form action = '../actions/action_register.php' method='post'>
            <input type="text" id="name" name="name" placeholder="Nome Completo" required>
			<input type="text" id="username" name="username" placeholder="Utilizador" required>

            <section id="messages">
			<?php foreach ($session->getMessages() as $messsage) { ?>
                <?php if($messsage['type'] == 'double_user'){ ?>
                    <article class="<?=$messsage['type']?>">
                    <?=$messsage['text']?>
                    </article>
                <?php } ?>
			<?php } ?>
			</section>

            <p class="text-caption" >Ao continuar, aceitas nosso <a target=_blank href="https://uploads.metropoles.com/wp-content/uploads/2020/08/10173820/Patrick-Estrela.jpg">Aviso de privacidade</a> e os <a target= _blank href="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTnGJcpiAYnzZx1H6D3Ek3zSiMtdi8P73wEE1a0YmXrOKSp5J5e">Termos de utilização</a> para criar uma conta Techwave</p>
			<input type="submit" value="Seguinte">
        </form>
    </div>
<?php } ?>


<?php function drawRegisterForm_second_step($username,$name) { ?>
   
<div class="container">
    <span class="text-eyebrow">Passo 2 de 2</span>
    <h1>Criar Conta</h1>
    <form action='../actions/action_register_second_step.php' method='post'>
        <input type="email" id="email" name="email" placeholder="E-mail" required>
        <input type="password" id="password" name="password" placeholder="Palavra-passe" required>
        <input type="password" id="password" name="password" placeholder="Confirme a palavra-passe" required>
        <input type="hidden" id="name" name="name" value=<?= $name ?> >
        <input type="hidden" id="username" name="username" value=<?= $username ?> >
        <input type="submit" value="Criar Conta">
    </form>
</div>
<?php } ?>