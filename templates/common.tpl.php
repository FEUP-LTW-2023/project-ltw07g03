<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawHeader() { ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- <meta name="description" content="Edite seus dados pessoais de nome, utilizador, senha e email" /> -->
        <title>Tech Wave</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
    <header>
        <a href=""><img id="logo" src="/imagens/logo.png" alt=logo></a>
    </header>
<?php } ?>


<?php function drawFooter() { ?>        
        <footer>
            <address>
                <a href="">TechWave © 2023</a>
                <span>Porto</span>
                <span>Portugal</span>
            </address>
        </footer>
    </body>
    <script type="text/javascript" src="/javascript/script.js"></script>
</html>
<?php } ?>