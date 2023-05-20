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
        <div class="item-1">    
        </div>

        <div class="item-2">
            <h2>📋 Meus Tickets</h2>
            <table class="client_ticket">
                <thead class="top-table">
                    <tr>
                        <th class="table-header-left">Assunto</th>
                        <th class="table-header">Departamento</th>
                        <th class="table-header">Data</th>
                        <th class="table-header-right">Estado</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php 
                    // Para cada ticket, obtém os detalhes completos usando getTicketById
                    foreach ($tickets as $ticket) {
                        $ticketId = $ticket['id_ticket'];
                    ?>
                        <tr>
                            <td class="table-data"><?= $ticket['the_subject'];?></td>
                            <td class="table-data"><?= Ticket::getDepartament($ticket['id_department'],$db);?></td>
                            <td class="table-data"><?= Ticket::getDate($ticketId, $db); ?></td>
                            <td class="table-data"><?= Ticket::getStatus($ticket['id_status'],$db);?></td>
                        </tr> 
                    <?php } ?>
                </tbody>
            </table>
            <p><?= count($tickets); ?> Tickets</p>
        </div>

        <div class="item-3">
            
        </div>
    </div>
</div>

<?php } ?>