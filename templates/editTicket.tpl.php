<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../Database/ticket.class.php');
require_once(__DIR__ . '/../Database/user.class.php');
require_once(__DIR__ . '/../Database/agent.class.php');

function drawEditTicket($ticket_id, Session $session, array $agents, $db)
{
    ?>
    <div class="container">
        <h1>Editar Ticket</h1>
        <form action="../actions/actionEditTicket.php?id=<?= $ticket_id ?>" method="post">

            <section id="messages">
                <?php foreach ($session->getMessages() as $message) {
                    if ($message['type'] == 'fail') {
                        ?>
                        <article class="<?= $message['type'] ?>">
                            <?= $message['text'] ?>
                        </article>
                        <?php
                    }
                }
                ?>
            </section>

            <div><span class="low_contrast">Categoria</span></div>
            <?php
            $ticket = Ticket::getTicketById($ticket_id, $db);
            ?>
            <select id="id_hashtag" name="id_hashtag">
                <option disabled selected value><?= Ticket::getHashtag($ticket->id_hashtag, $db) ?></option>
                <option value="1">Pedido</option>
                <option value="2">Elogio</option>
                <option value="3">Dúvida</option>
                <option value="4">Sugestão</option>
                <option value="5">Reclamação</option>
            </select>

            <div><span class="low_contrast">Departamento</span></div>
            <select id="id_department" name="id_department">
                <option disabled selected value><?= Ticket::getDepartament($ticket->id_department, $db) ?></option>
                <option value="1">Contabilidade</option>
                <option value="2">Suporte Técnico</option>
                <option value="3">Faturação</option>
                <option value="4">Vendas</option>
                <option value="5">Serviço de Atendimento ao Cliente</option>
                <option value="6">Geral</option>
            </select>

            <div><span class="low_contrast">Estado</span></div>
            <select id="id_status" name="id_status">
                <option disabled selected value><?= Ticket::getStatus($ticket->id_status, $db) ?></option>
                <option value="1">Aberto</option>
                <option value="2">Fechado</option>
            </select>

            <div><span class="low_contrast">Agente Responsável</span></div>
            <select id="id_assigned_agent" name="id_assigned_agent">
                <option disabled selected value>
                    <?= User::checkName(Agent::getAgentUser($ticket->id_assigned_agent, $db), $db) ?>
                </option>
                <?php
                foreach ($agents as $agentId) {
                    $agent = Agent::getAgentUser($agentId, $db);
                    ?>
                    <option value="<?= $agentId ?>"><?= User::checkName($agent, $db) ?></option>
                    <?php
                }
                ?>
            </select>

            <input type="submit" value="Guardar">
        </form>
    </div>
    <?php
}
?>
