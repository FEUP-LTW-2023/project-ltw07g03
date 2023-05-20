<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../Database/ticket.class.php');
?>

<?php function drawMessageTickets($name, $ticket_id, $messages, PDO $db) { ?>
    <div class="ticket-messages">
            <h2>Histórico de Mensagens</h2>
            <ul id="message-list">
            <?php foreach ($messages as $message) { 
                echo "Mensagem: " . $message['message_text'] . "<br>";
                echo "Remetente: " . $message['sender'] . "<br>";
                echo "Enviada em: " . $message['sent_at'] . "<br>";
                echo "<br>";
            } ?>
            </ul>
        </div>
        
        <div class="reply-form">
            <h2>Responder ao Ticket</h2>
            <form action="../actions/actionAnswerTicket.php" method="post">
                <input type="hidden" id="ticket_id" name="ticket_id" value=<?= $ticket_id ?>>
                <textarea name="message_text" id="messageText" placeholder="Digite sua resposta"></textarea>
                <input type="hidden" id="name" name="name" value="<?= $name ?>">
                <button type="submit">Enviar Resposta</button>
            </form>
        </div>
    </main>
<?php } ?>