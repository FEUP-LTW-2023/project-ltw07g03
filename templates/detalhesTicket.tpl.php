<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawDetalhesTicket() { ?>

    <main>
        <h1>Detalhes do Ticket</h1>
        
        <div class="ticket-details">
            <h2>Assunto: <span id="ticket-subject">Assunto do Ticket</span></h2>
            <p>Departamento: <span id="ticket-department">Departamento do Ticket</span></p>
            <p>Data: <span id="ticket-date">Data do Ticket</span></p>
            <p>Estado: <span id="ticket-status">Estado do Ticket</span></p>
        </div>
        
        <div class="ticket-messages">
            <h2>Histórico de Mensagens</h2>
            <ul id="message-list">
                <!-- Lista de mensagens do ticket -->
                <!-- Cada mensagem pode ser exibida como um <li> -->
            </ul>
        </div>
        
        <div class="reply-form">
            <h2>Responder ao Ticket</h2>
            <form action="respostaTicket.php" method="post">
                <textarea name="reply" placeholder="Digite sua resposta"></textarea>
                <button type="submit">Enviar Resposta</button>
            </form>
        </div>
    </main>
<?php } ?>