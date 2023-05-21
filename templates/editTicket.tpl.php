<?php 
  declare(strict_types = 1); 

   require_once(__DIR__ . '/../utils/session.php');
   require_once(__DIR__ . '/../Database/ticket.class.php');
?>

<?php function drawEditTicket($ticket_id, Session $session, $db) { ?>

<div class="container">
		<h1>Editar Ticket</h1>
		<form action="../actions/actionEditTicket.php?id=<?= $ticket_id ?>" method="post">

            
            <section id="messages">
			<?php foreach ($session->getMessages() as $messsage) { ?>
                <?php if($messsage['type'] == 'fail'){ ?>
                    <article class="<?=$messsage['type']?>">
                    <?=$messsage['text']?>
                    </article>
                <?php } ?>
			<?php } ?>
			</section>

            <!-- <input type="hidden" id="id_agent" name="id_agent" value=<?= $id_user ?> > -->
            <div><span class="low_contrast">Categoria</span></div>
            <?php $ticket = Ticket::getTicketById($ticket_id, $db); ?>
            <select id="id_hashtag" name="id_priority">
                <option disabled selected value>Original: <?= Ticket::getHashtag($ticket->id_hashtag, $db);?></option>
                <option value="1">Pedido</option>
                <option value="2">Elogio</option>
                <option value="3">Dúvida</option>
                <option value="4">Sugestão</option>
                <option value="5">Reclamação</option>
            </select>
            <div><span class="low_contrast">Departamento</span></div>
            <select id="id_department" name="id_department" >
                <option disabled selected value>Original: <?= Ticket::getDepartament($ticket->id_department, $db);?></option>
                <option value="1">Contabilidade</option>
                <option value="2">Suporte Técnico</option>
                <option value="3">Faturação</option>
                <option value="4">Vendas</option>
                <option value="5">Serviço de Atendimento ao Cliente</option>
                <option value="6">Geral</option>
            </select>
            <div><span class="low_contrast">Estado</span></div>
            <select id="id_status" name="id_status" >
                <option disabled selected value>Original: <?= Ticket::getStatus($ticket->id_status, $db);?></option>
                <option value="1">Aberto</option>
                <option value="2">Fechado</option>
            </select>
			<input type="submit" value="Guardar">
	    </form>
</div>

<?php } ?>