<?php

?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Faça login na sua conta com seu nome de usuário e palavra-passe." />
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<header>
	<a href=""><img id="logo" src="logo.png"></a>
</header>
<body>
	<div class="container">
		<h1>Iniciar Sessão</h1>
		<form>
			<input type="text" id="username" name="username" placeholder="Utilizador" required>
			<input type="password" id="password" name="password" placeholder="Palavra-passe" required>
			<input type="submit" value="Login">
		<div class="divider"></div>
		<input type="submit" value="Criar uma conta" class="newlogin">
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
