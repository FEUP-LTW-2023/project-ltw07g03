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
        <title>Tech Wave</title>
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
                    <a href = "../pages/newTicket.php" >Criar Novo Ticket</a><br>
                    <a href = "../pages/clientsPage.php" >Meus Tickets</a><br>
                    <?php if ($user->category === "agent" || $user->category === "admin" ) { ?>
                        <a href = "../pages/agentsPage.php" >Página do Agente</a><br>
                    <?php } ?>
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
        <div class="table-container">
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
                    <?php foreach ($tickets as $ticket) { ?>
                        <tr onclick="redirectToPage(this)" ticket_id="<?= $ticket['id_ticket']; ?>">
                            <td class="table-data"><?= $ticket['the_subject']; ?></td>
                            <td class="table-data"><?= Ticket::getDepartament($ticket['id_department'], $db); ?></td>
                            <td class="table-data"><?= Ticket::getDate($ticket['id_ticket'], $db); ?></td>
                            <td class="table-data"><?= Ticket::getStatus($ticket['id_status'], $db); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <p><?= count($tickets); ?> Tickets</p>
    </div>

    <div class="item-3">

    </div>
    </div>

    <style>
    /* Estilos para dispositivos móveis */
    @media screen and (max-width: 768px) {
        .grid-container {
            display: block;
        }

        .item-1,
        .item-2,
        .item-3 {
            width: 100%;
        }

        .table-container {
            overflow-x: auto;
        }

        .client_ticket {
            width: 100%;
        }
    }
    </style>

<?php } ?>