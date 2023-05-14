<?php

?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Faça login na sua conta com seu utilizador e palavra-passe." />
	<title>New Account</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<header>
	<a href=""><img id="logo" src="logo.png"></a>
</header>
<body>
	<div class="container">
        <span class="text-eyebrow">Passo 1 de 2</span>
		<h1>Criar Conta</h1>
		<form action="New_account_second_step.php">
            <input type="text" id="nome" name="nome" placeholder="Nome Completo" required>
			<input type="text" id="username" name="username" placeholder="Utilizador" required>
            <p class="text-caption" >Ao continuar, aceitas nosso <a target=_blank href="https://uploads.metropoles.com/wp-content/uploads/2020/08/10173820/Patrick-Estrela.jpg">Aviso de privacidade</a> e os <a target= _blank href="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTnGJcpiAYnzZx1H6D3Ek3zSiMtdi8P73wEE1a0YmXrOKSp5J5e">Termos de utilização</a> para criar uma conta Techwave</p>
			<input type="submit" value="Seguinte">
	</form>
</div>
</body>
<footer>
	<address>
        <a href="">TechWave © 2023</a>
        <span>Porto</span>
        <span>Portugal</span>
    </address>
</footer>
</html>

<?php

?>