<?php 
  declare(strict_types = 1); 

   require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawLoginForm(Session $session) { ?>

    <div class="container">
		<h1>Iniciar Sessão</h1>
		<form action = "../actions/action_login.php" method="post">
			<input type="text" id="username" name="username" placeholder="Utilizador">
			<input type="password" id="pwd" name="pwd" placeholder="Palavra-passe">
			
			<section id="messages">
			<?php foreach ($session->getMessages() as $messsage) { ?>
				<article class="<?=$messsage['type']?>">
				<?=$messsage['text']?>
				</article>
			<?php } ?>
			</section>
			
			<input type="submit" value="Login">
		<div class="divider"></div>
		</form>
		<form action = "register.php">
			<input type="submit" value="Criar uma conta" class="newlogin">
		</form>
    </div>

<?php } ?>