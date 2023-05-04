<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Edite seus dados pessoais de nome, utilizador, senha e email" />
	<title>Editar Perfil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<header>
	<a href=""><img id="logo" src="logo.png"></a>
</header>
<body>
	<div class="container">
		<h1>Editar Perfil</h1>
		<div class="user-info">
			<div><span class = "low_contrast">Nome Completo</span></div><p class="p-edit"><span id="name-text" class = "high_contrast">John Doe</span><button class="edit-btn" data-field="nome">Editar</button></p>
            <div><span class = "low_contrast">E-mail</span></div> <p class="p-edit"><span id="email-text" class = "high_contrast">johndoe@example.com</span> <button class="edit-btn" data-field="e-mail">Editar</button></p>
			<div><span class = "low_contrast">Palavra-passe</span></div> <p class="p-edit"><span id="password-text" class = "high_contrast"> ********</span> <button class="edit-btn" data-field="palavra-passe">Editar</button></p>
			<div><span class = "low_contrast">Utilizador</span></div> <p class="p-edit"><span id="username-text" class = "high_contrast">johndoe123</span><button class="edit-btn" data-field="utilizador">Editar</button></p>
		</div>
		<div class="edit-popup" id="edit-popup">
			<div class="edit-popup-content">
				<h2>Editar <span id="field-name"></span></h2>
                <span class="close-btn">&times;</span>
				<form method="post" action="" id="edit-form">
					<input type="text" id="edit-input" name="edit-input"><br>
					<input type="submit" value="Salvar">
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="script.js"></script>
</body>
<footer>
	<address>
        <a href="">TechWave © 2023</a>
        <span>Porto</span>
        <span>Portugal</span>
    </address>
</footer>
</html>






	<!-- 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Edite seus dados pessoais de nome, utilizador, senha e email" />
	<title>Editar Perfil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<header>
	<a href=""><img id="logo" src="logo.png"></a>
</header>
<body>
<div class="container">
		<h1>Editar Perfil</h1>
    
        <div class="container_edit">
		<h1>Editar Perfil</h1>
		<div>
			<div><span class = "low_contrast">Nome Completo</span></div><span id="name-text" class = "high_contrast">John Doe</span><button class="edit-btn" data-field="Nome">Editar</button>
            <div><span class = "low_contrast">E-mail</span></div> <span id="email-text" class = "high_contrast">johndoe@example.com</span> <button class="edit-btn" data-field="E-mail">Editar</button>
			<div><span class = "low_contrast">Palavra passe</span></div><span id="password-text" class = "high_contrast"> ********</span> <button class="edit-btn" data-field="Palavra-passe">Editar</button>
			<div><span class = "low_contrast">Utilizador</span></div> <span id="username-text" class = "high_contrast">johndoe123</span><button class="edit-btn" data-field="Utilizador">Editar</button>
		</div>
		<div class="edit-popup" id="edit-popup">
			<div class="edit-popup-content">
                <span class="close-btn">&times;</span>
				<h2>Editar <span id="field-name"></span></h2>
				<form method="post" action="process_edit.php" id="edit-form">
					<input type="text" id="edit-input" name="edit-input"><br>
					<input type="submit" value="Salvar">
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="script.js"></script>
</body>
<footer>
	<address>
        <a href="">TechWave © 2023</a>
        <span>Porto</span>
        <span>Portugal</span>
    </address>
</footer>
</html> -->
