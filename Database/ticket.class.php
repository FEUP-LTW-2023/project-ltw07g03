<?php
  declare(strict_types = 1);

  class Ticket {
    public int $id_ticket;
    public int $id_user;
    public string $the_subject;
    public int $id_department;
    public string $ticket_date;
    public int $id_hashtag;
    public int $id_assigned_agent;
    public int $id_status;
    public string $message;
    public int $id_priority;


    public function __construct(int $id_ticket, int $id_user, string $the_subject, string $ticket_date, int $id_hashtag, int $id_department, int $id_assigned_agent, int $id_status, string $message, int $id_priority)
    {
      $this->id_ticket = $id_ticket;
      $this->id_user = $id_user;
      $this->the_subject = $the_subject;
      $this->ticket_date = $ticket_date;
      $this->id_hashtag = $id_hashtag;
      $this->id_department = $id_department;
      $this->id_assigned_agent = $id_assigned_agent;
      $this->id_status = $id_status;
      $this->message = $message;
      $this->id_priority = $id_priority;
    }

    static function addTicket($id_user, $the_subject, $id_hashtag, $id_department, $id_assigned_agent, $id_status, $message, $id_priority, $db){

      $stmt = $db->prepare('INSERT INTO Tickets (id_user, the_subject, id_hashtag, id_department, id_assigned_agent, id_status, message, id_priority) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');
      $stmt->execute(array($id_user, $the_subject, $id_hashtag, $id_department, $id_assigned_agent, $id_status, $message, $id_priority));
  }

  public static function getAssignedAgent($departmentId, $db)
{
    $query = "SELECT id_agent FROM Agents WHERE id_department = :departmentId
              ORDER BY (SELECT COUNT(*) FROM Tickets WHERE id_assigned_agent = Agents.id_agent) ASC
              LIMIT 1";
    
    $stmt = $db->prepare($query);
    $stmt->bindValue(':departmentId', $departmentId, PDO::PARAM_INT);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result !== false) {
        return (int) $result['id_agent'];
    }
    
    // Se nenhum agente for encontrado, retorna 0 para indicar que não há agentes disponíveis.
    return 0;
}

public static function getDate($id_ticket, $db)
{
    // Consultar o banco de dados para obter o valor do campo TIMESTAMP
    $query = "SELECT ticket_date FROM Tickets WHERE id_ticket = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id_ticket, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result !== false) {
        // Obter o valor do campo TIMESTAMP do banco de dados
        $timestamp = $result['ticket_date'];

        // Converta o valor do timestamp para uma data no formato PHP
        $date = new DateTime($timestamp);

        // Obtenha a data atual
        $now = new DateTime();

        // Calcule a diferença entre as datas
        $diff = $now->diff($date);

        // Obtenha o número de dias da diferença
        $days = $diff->days;

        // Crie a string "há X dias" para exibição
        if ($days == 0) {
            $output = "hoje";
        } elseif ($days == 1) {
            $output = "há 1 dia";
        } else {
            $output = "há " . $days . " dias";
        }

        return $output;
    }

    // Caso o ticket não seja encontrado
    return "Ticket não encontrado ou valor inadequado";
}

public static function getClientTickets($userId, $db)
{
    $query = "SELECT the_subject, id_department, id_status FROM Tickets WHERE id_user = ?";
    $stmt = $db->prepare($query);
    $stmt->execute(array($userId));
    $tickets = $stmt->fetch();
    return $tickets['id_department'];
    // $tickets = array();
    // while($ticket = $stmt->fetch()){
    //   $tickets[] = new Ticket(
    //       $ticket[]


    //   ); 
    // }
    // echo $tickets[1]['id_department'];
    die();
    return $tickets;
}

public static function getTicketById($ticketId, $db)
{
    $query = "SELECT * FROM Tickets WHERE id_ticket = :ticketId";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':ticketId', $ticketId, PDO::PARAM_INT);
    $stmt->execute();

    $ticketData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($ticketData === false) {
        return null; // Ticket não encontrado
    }

    $ticket = new Ticket();
    $ticket->setId($ticketData['id_ticket']);
    $ticket->setUserId($ticketData['id_user']);
    $ticket->setSubject($ticketData['the_subject']);
    $ticket->setDepartmentId($ticketData['id_department']);
    $ticket->setTimestamp($ticketData['ticket_date']);
    $ticket->setHashtagId($ticketData['id_hashtag']);
    $ticket->setAgentId($ticketData['id_assigned_agent']);
    $ticket->setStatus($ticketData['id_status']);
    $ticket->setMessage($ticketData['message']);
    $ticket->setPriority($ticketData['priority']);

    return $ticket;
}

}
?>