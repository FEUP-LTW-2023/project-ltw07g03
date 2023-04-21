<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Crie um ticket novo" />
	<title>New Ticket</title>
	<link rel="stylesheet" type="text/css" href="style_new_ticket.css">
</head>
<header>
	<a href=""><img id="logo" src="logo.png"></a>
</header>
<body>
	<div class="container">
		<h1>Novo Ticket</h1>
		<form>
            <input type="text" id="nome" name="nome" placeholder="Nome" required>
            <input type="text" id="subject" name="subject" placeholder="Assunto" required>
            <textarea type="text" id="message" name="message" placeholder="Mensagem" rows="7" required></textarea>
			<input type="submit" value="Criar">
	</form>
</div>
</body>
</html>

<?php

?>
