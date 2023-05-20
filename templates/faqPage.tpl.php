<?php 
    declare(strict_types = 1); 

    require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/../Database/user.class.php');
    require_once(__DIR__ . '/../Database/ticket.class.php');
?>

<?php function drawHeaderClientPage(User $user) { ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Página de FAQ</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
    <header>
        <nav>
            <a href=""><img id="logo" src="/imagens/logo.png" alt=logo></a>
            <div class="dropdown">
                <button class="username">Olá, <?= $user->name; ?>!</button>
                <div class="dropdown-content">
                    <a href = "../pages/edit_profile.php">Editar Perfil</a><br>
                    <a href = "../pages/NewTicket.php" >Criar Novo Ticket</a><br>
                    <form action="../actions/action_logout.php" method="post" class="logout">
                        <button class="client-page" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
<?php } ?>

<?php function drawClientPage(User $user, array $tickets, $db) { ?>

    <div class="grid-container">
    <div class="text-center">
      <p class="h1 text-uppercase text-white text-shadow: 2px 2px 4px #000000 font-weight-bold">Perguntas
        Frequentes</p>
    </div>

    <details>
        <summary>Enviei um ticket, mas ainda não obtive resposta. O que devo fazer?</summary>
        <p>Pedimos desculpas pelo atraso na resposta. Por favor, verifique se o seu ticket foi enviado corretamente e aguarde mais algum tempo. Se a demora persistir, entre em contato connosco novamente, para que o possamos ajudar.</p>
    </details>

    <details>
        <summary>Recebi uma resposta do suporte, mas não entendi completamente a solução proposta. O que devo fazer?</summary>
        <p>Caso tenha dúvidas sobre a resposta fornecida pelo suporte, não hesite em entrar em contato connosco para solicitar mais informações ou esclarecimentos adicionais. Teremos prazer em ajudá-lo a entender melhor a solução proposta.</p>
    </details>

    <details>
        <summary>Acidentalmente fechei um ticket, mas ainda preciso de assistência. Como posso reabri-lo?</summary>
        <p>Se fechou acidentalmente um ticket e ainda precisa de assistência, entre em contato connosco o mais rápido possível. Faremos o possível para reabrir o ticket e continuar a fornecer suporte para resolver o seu problema.</p>
    </details>

    <details>
        <summary>Encontrei um erro no ticket que enviei. Posso corrigi-lo?</summary>
        <p>Sim, pode editar os tickets a partir do botão “Editar Ticket”.</p>
    </details>

    <details>
        <summary>Quanto tempo leva para resolver um problema através de um ticket?</summary>
        <p>2. O tempo necessário para resolver um problema através de um ticket pode variar dependendo da natureza do problema e do volume de tickets recebidos. O nosso objetivo é resolver os problemas o mais rápido possível e faremos o possível para fornecer uma solução dentro de um prazo razoável.
        </p>
    </details>

</div>


<?php } ?>
