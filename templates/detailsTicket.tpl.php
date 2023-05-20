<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../Database/user.class.php');
  require_once(__DIR__ . '/../Database/ticket.class.php');
?>

<?php function drawDetailsTicket($ticket_id, $db) { ?>

<main>
    <h1>Detalhes do Ticket</h1>
    <?php
    $ticket = Ticket::getTicketById($ticket_id, $db);
    if ($ticket !== null) {
    ?>
        <div class="ticket-details">
            <h2>Assunto: <span id="ticket-subject"><?= $ticket->the_subject; ?></span></h2>
            <p>Departamento: <span id="ticket-department"><?= Ticket::getDepartament($ticket->id_department, $db); ?></span></p>
            <p>Data: <span id="ticket-date"><?= Ticket::getDate($ticket->id_ticket, $db); ?></span></p>
            <p>Estado: <span id="ticket-status"><?= Ticket::getStatus($ticket->id_status, $db); ?></span></p>
        </div>
    <?php } else { ?>
        <p>Ticket não encontrado.</p>
    <?php } ?>
    
<?php } ?>
