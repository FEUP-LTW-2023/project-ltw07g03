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
        <title>Editar Perfil</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
    <header>
        <nav>
            <a href=""><img id="logo" src="/imagens/logo.png" alt=logo></a>
            <div class="user">
                <span class="username">Olá, <?= $user->name; ?>!</span>
            </div>
        </nav>
    </header>
<?php } ?>

<?php function drawClientPage(User $user, array $tickets, $db) { ?>

<div class="grid-container">
        <div class="item-1">
        </div>

        <div class="item-2">
            <h2>📋 Meus Tickets</h2>
            <table>
                <thead>
                    <tr>
                        <th>Assunto</th>
                        <th>Departamento</th>
                        <th>Data</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Para cada ticket, obtém os detalhes completos usando getTicketById
                    foreach ($tickets as $ticketData) {
                        $ticketId = $ticketData['id_ticket'];
                        $ticket = Ticket::getTicketById($ticketId, $db);
                    ?>
                        <tr>
                            <td><?= $ticket->getSubject();?></td>
                            <td><?= $ticket->getDepartmentId();?></td>
                            <td><?= Ticket::getDate($ticketId, $db); ?></td>
                            <td><?= $ticket->getStatus();?></td>
                        </tr> 
                    <?php } ?>
                </tbody>
            </table>
            <p><?= count($tickets); ?> Tickets</p>
        </div>

        <div class="item-3">
            <a href = "../pages/NewTicket.php"><button>Novo Ticket</button></a>
            <a href = "../pages/edit_profile.php"><button>Editar Perfil</button></a>
        </div>
    </div>
</div>

<?php } ?>