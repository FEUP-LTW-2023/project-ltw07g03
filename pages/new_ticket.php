<?php

?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Crie um ticket novo" />
	<title>New Ticket</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
            <input type="text" id="departement" name="departement" placeholder="Departamento" required>
            <textarea type="text" id="message" name="message" placeholder="Mensagem" rows="7" required></textarea>
            <select id="priority" name="priority" required>
                <option value="">--Escolha o nível de prioridade--</option>
                <option value="Normal">Normal</option>
                <option value="Urgente">Urgente</option>
                <option value="Muito urgente">Muito urgente</option>
            </select>
			<input type="submit" value="Guardar">
	    </form>
    </div>
</body>
</html>

<?php

?>
