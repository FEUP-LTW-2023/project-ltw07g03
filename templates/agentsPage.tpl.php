<?php 
    declare(strict_types = 1); 

    require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/../Database/user.class.php');
    require_once(__DIR__ . '/../Database/ticket.class.php');
    require_once(__DIR__ . '/../Database/agent.class.php');
?>

<?php function drawAgentPage(User $user, array $tickets, $db) { ?>

<div class="grid-container">
<div class="item-1">
</div>

<div class="item-2">
    <h2>📋 Tickets do Departamento</h2>
    <div class="table-container">
        <table class="client_ticket">
            <thead class="top-table">
                <tr>
                    <th class="table-header-left">Assunto</th>
                    <th class="table-header">Agente Responsável</th>
                    <th class="table-header">Data</th>
                    <th class="table-header">Estado</th>
                    <th class="table-header">Prioridade</th>
                    <th class="table-header-right">Categoria</th>
                </tr>
            </thead>
            <tbody class="body-table">
                <?php foreach ($tickets as $ticket) { ?>
                    <tr onclick="redirectToPage(this)" ticket_id="<?= $ticket['id_ticket']; ?>">
                        <td class="table-data"><?= $ticket['the_subject']; ?></td>
                        <td class="table-data"><?= User::checkName(Agent::getAgentUser($ticket['id_assigned_agent'], $db), $db); ?></td>
                        <td class="table-data"><?= Ticket::getDate($ticket['id_ticket'], $db); ?></td>
                        <td class="table-data"><?= Ticket::getStatus($ticket['id_status'], $db); ?></td>
                        <td class="table-data"><?= Ticket::getPriority($ticket['id_priority'], $db);  ?></td>
                        <td class="table-data"><?= Ticket::getHashtag($ticket['id_hashtag'], $db);  ?></td>
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