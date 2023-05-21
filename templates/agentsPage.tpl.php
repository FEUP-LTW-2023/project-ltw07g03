<?php function drawAgentPage(User $user, array $tickets, $db) { ?>

<div class="grid-container">
    <div class="item-1">
    </div>

    <div class="item-2">
        <h2>📋 Tickets do Departamento</h2>
        <div class="table-container">
            <div class="scroll-container">
                <table class="client_ticket">
                    <thead class="top-table">
                        <tr>
                            <th class="table-header-left">Assunto</th>
                            <th class="table-header">Agente Responsável</th>
                            <th class="table-header">Data </th>
                            <th class="table-header">Estado </th>
                            <th class="table-header">Prioridade </th>
                            <th class="table-header">Categoria </th>
                            <th class="table-header-right"></th>
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
                                <td class="table-data"><button class="edit-button"><img src="../imagens/editar.png" alt="Editar"></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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

    .scroll-container {
        overflow-x: scroll;
    }

    .client_ticket {
        width: 100%;
    }
}
</style>

<?php } ?>
