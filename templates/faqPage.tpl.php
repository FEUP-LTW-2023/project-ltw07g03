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
      <p class="h1 text-uppercase text-white text-shadow: 2px 2px 4px #000000 font-weight-bold reveal">Perguntas
        Frequentes</p>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item bg-primary text-white reveal">
                    <p class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed bg-primary text-white" style="font-size: 20px;" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne">
                            Enviei um ticket, mas ainda não obtive resposta. O que devo fazer?
                        </button>
                    </p>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="h5 accordion-body">
                        <p>Pedimos desculpas pelo atraso na resposta. Por favor, verifique se o seu ticket foi enviado corretamente e aguarde mais algum tempo. Se a demora persistir, entre em contato connosco novamente, para que o possamos ajudar.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item bg-primary text-white reveal">
                    <p class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed bg-primary text-white" style="font-size: 20px;" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                            aria-controls="flush-collapseTwo">
                            Recebi uma resposta do suporte, mas não entendi completamente a solução proposta. O que devo fazer?
                        </button>
                    </p>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="h5 accordion-body">
                        <p>Caso tenha dúvidas sobre a resposta fornecida pelo suporte, não hesite em entrar em contato connosco para solicitar mais informações ou esclarecimentos adicionais. Teremos prazer em ajudá-lo a entender melhor a solução proposta.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item bg-primary text-white reveal">
                    <p class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed bg-primary text-white" style="font-size: 20px;" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Acidentalmente fechei um ticket, mas ainda preciso de assistência. Como posso reabri-lo?
                        </button>
                    </p>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                        data-bs-parent="#accordionFlushExample">
                        <div class="h5 accordion-body">
                        <p>Se fechou acidentalmente um ticket e ainda precisa de assistência, entre em contato connosco o mais rápido possível. Faremos o possível para reabrir o ticket e continuar a fornecer suporte para resolver o seu problema.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item bg-primary text-white reveal">
                    <p class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed bg-primary text-white" style="font-size: 20px;" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false"
                            aria-controls="flush-collapseFour">
                            Encontrei um erro no ticket que enviei. Posso corrigi-lo?
                        </button>
                    </p>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                        data-bs-parent="#accordionFlushExample">
                        <div class="h5 accordion-body">
                        <p>Sim, pode editar os tickets a partir do botão “Editar Ticket”.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item bg-primary text-white reveal">
                        <p class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed bg-primary text-white" style="font-size: 20px;" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false"
                            aria-controls="flush-collapseFive">
                            Quanto tempo leva para resolver um problema através de um ticket?
                            </button>
                        </p>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
                        data-bs-parent="#accordionFlushExample">
                        <div class="h5 accordion-body">
                        <p>O tempo necessário para resolver um problema através de um ticket pode variar dependendo da natureza do problema e do volume de tickets recebidos. O nosso objetivo é resolver os problemas o mais rápido possível e faremos o possível para fornecer uma solução dentro de um prazo razoável.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>
