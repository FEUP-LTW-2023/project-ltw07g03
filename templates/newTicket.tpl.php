<?php 
  declare(strict_types = 1); 

   require_once(__DIR__ . '/../utils/session.php');
   require_once(__DIR__ . '/../Database/user.class.php');
?>

<?php function drawNewTicket(User $user) { ?>

<div class="container">
		<h1>Novo Ticket</h1>
		<form action = "../actions/actionNewTicket.php" method = "post">
            <input type="hidden" id="id_user" name="id_user" value=<?= $id_user ?> >
            <div><span class="low_contrast">Assunto</span></div>
            <input type="text" id="the_subject" name="the_subject" placeholder="Ex: Problemas de rede" required>
            <div><span class="low_contrast">Data da Solicitação</span></div>
            <input type="date" id="ticket_date" name="ticket_date" required>
            <div><span class="low_contrast">Departamento</span></div>
            <select id="id_department" name="id_department" required>
                <option disabled selected value>selecione uma opção</option>
                <option value="1">Contabilidade</option>
                <option value="2">Suporte Técnico</option>
                <option value="3">Faturação</option>
                <option value="4">Vendas</option>
                <option value="5">Serviço de Atendimento ao Cliente</option>
                <option value="6">Geral</option>
            </select>
            <div><span class="low_contrast">Como podemos te ajudar hoje?</span></div>
            <textarea type="text" id="message" name="message" placeholder="Escreva aqui a sua mensagem" rows="7" required></textarea>
            <div><span class="low_contrast">Qual o nível de urgência da sua solicitação?</span></div>
            <select id="id_status" name="id_status" required>
                <option disabled selected value>selecione uma opção</option>
                <option value="1">Normal</option>
                <option value="2">Urgente</option>
                <option value="3">Muito urgente</option>
            </select>
			<input type="submit" value="Guardar">
	    </form>
</div>

<?php } ?>