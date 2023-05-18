<?php 
  declare(strict_types = 1); 

   require_once(__DIR__ . '/../utils/session.php');
   require_once(__DIR__ . '/../Database/user.class.php');
?>

<?php function drawNewTicket(User $user, Session $session) { ?>

<div class="container">
		<h1>Novo Ticket</h1>
		<form action = "../actions/actionNewTicket.php" method = "post">
            
            <section id="messages">
			<?php foreach ($session->getMessages() as $messsage) { ?>
                <?php if($messsage['type'] == 'fail'){ ?>
                    <article class="<?=$messsage['type']?>">
                    <?=$messsage['text']?>
                    </article>
                <?php } ?>
			<?php } ?>
			</section>

            <input type="hidden" id="id_user" name="id_user" value=<?= $id_user ?> >
            <div><span class="low_contrast">Qual o assunto da sua solicitação?</span></div>
            <input type="text" id="the_subject" name="the_subject" placeholder="Ex: Problemas de rede" required>
            <div><span class="low_contrast">Categoria</span></div>
            <select id="id_hashtag" name="id_hashtag" required>
                <option disabled selected value>selecione uma opção</option>
                <option value="1">Pedido</option>
                <option value="2">Elogio</option>
                <option value="3">Dúvida</option>
                <option value="4">Sugestão</option>
                <option value="5">Reclamação</option>
            </select>
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
            <select id="id_priority" name="id_priority" required>
                <option disabled selected value>selecione uma opção</option>
                <option value="1">Normal</option>
                <option value="2">Urgente</option>
                <option value="3">Muito urgente</option>
            </select>
			<input type="submit" value="Guardar">
	    </form>
</div>

<?php } ?>