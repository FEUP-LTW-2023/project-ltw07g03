<?php
  declare(strict_types = 1);

  class Ticket {
    public int $id_ticket;
    public int $id_user;
    public string $the_subject;
    public string $ticket_date;
    public int $id_hashtag;
    public int $id_department;
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
    $stmt->execute(array(':id' => $id_ticket));
    $result = $stmt->fetch();

    if ($result !== false) {
        // Obter a parte da data do campo ticket_date do banco de dados
        $ticket_day = substr($result['ticket_date'], 0, 10);

        // Obter a parte da data atual
        $current_day = date("Y-m-d");

        // Calcular a diferença em dias
        $diff = strtotime($current_day) - strtotime($ticket_day);
        $days = floor($diff / (60 * 60 * 24));

        // Criar a string "há X dias" para exibição
        if ($days == 0) {
            $output = "hoje";
        } elseif ($days == 1) {
            $output = "há 1 dia";
        } else {
            $output = "há " . $days . " dias";
        }

        return $output;
    }

    //Caso o ticket não seja encontrado
    return "Ticket não encontrado ou valor inadequado";
}


public static function getClientTickets($userId, $db)
{
    $query = "SELECT id_ticket, ticket_date, the_subject, id_department, id_status FROM Tickets WHERE id_user = ?";
    $stmt = $db->prepare($query);
    $stmt->execute(array($userId));
    $tickets = array();
    while($ticket = $stmt->fetch()){
        $ticketAtributes = array();
        $ticketAtributes['id_ticket'] = $ticket['id_ticket'];
        $ticketAtributes['ticket_date'] = $ticket['ticket_date'];
        $ticketAtributes['the_subject'] = $ticket['the_subject'];
        $ticketAtributes['id_department'] = $ticket['id_department'];
        $ticketAtributes['id_status'] = $ticket['id_status'];
        $tickets[] = $ticketAtributes;
    }
   return $tickets;
}

public static function getDepartamentTickets($id_department, $db)
{
    $query = "SELECT id_ticket, the_subject, ticket_date, id_hashtag, id_assigned_agent, id_status, id_priority FROM Tickets WHERE id_department = ?";
    $stmt = $db->prepare($query);
    $stmt->execute(array($id_department));
    $tickets = array();
    while($ticket = $stmt->fetch()){
        $ticketAtributes = array();
        $ticketAtributes['id_ticket'] = $ticket['id_ticket'];
        $ticketAtributes['the_subject'] = $ticket['the_subject'];
        $ticketAtributes['ticket_date'] = $ticket['ticket_date'];
        $ticketAtributes['id_hashtag'] = $ticket['id_hashtag'];
        $ticketAtributes['id_assigned_agent'] = $ticket['id_assigned_agent'];
        $ticketAtributes['id_status'] = $ticket['id_status'];
        $ticketAtributes['id_priority'] = $ticket['id_priority'];
        $tickets[] = $ticketAtributes;
    }
   return $tickets;
}

public static function getTicketById($ticket_id, PDO $db) : ?Ticket {

    $query = "SELECT * FROM Tickets WHERE id_ticket = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$ticket_id]);

    $ticketData = $stmt->fetch();

    if ($ticketData === false) {
        return null; // Ticket não encontrado
    }
    
    $ticket = new Ticket(
        $ticketData['id_ticket'],
        $ticketData['id_user'],
        $ticketData['the_subject'],
        $ticketData['ticket_date'],
        $ticketData['id_hashtag'],
        $ticketData['id_department'],
        $ticketData['id_assigned_agent'],
        $ticketData['id_status'],
        $ticketData['message'],
        $ticketData['id_priority']
    );

    return $ticket;
}


public static function getStatus($id_status, $db)
{
    // Consultar o banco de dados para obter o valor do campo status_name
    $query = "SELECT status_name FROM Status WHERE id_status = :id";
    $stmt = $db->prepare($query);
    $stmt->execute(array(':id' => $id_status));
    $result = $stmt->fetch();

    if ($result !== false) {
        // Obter o valor do campo status_name
        $status_name = $result['status_name'];

        return $status_name;
    }

    // Caso o status não seja encontrado
    return "Status não encontrado ou valor inadequado";
}

public static function getDepartament($id_department, $db)
{
    // Consultar o banco de dados para obter o valor do campo department_name
    $query = "SELECT department_name FROM Departments WHERE id_department = :id";
    $stmt = $db->prepare($query);
    $stmt->execute(array(':id' => $id_department));
    $result = $stmt->fetch();

    if ($result !== false) {
        // Obter o valor do campo department_name
        $department_name = $result['department_name'];

        return $department_name;
    }

    // Caso o departamento não seja encontrado
    return "Departamento não encontrado para o ID fornecido";
}

public static function getPriority($id_priority, $db)
{
    // Consultar o banco de dados para obter o valor do campo 
    $query = "SELECT priority_name FROM Priority WHERE id_priority = :id";
    $stmt = $db->prepare($query);
    $stmt->execute(array(':id' => $id_priority));
    $result = $stmt->fetch();

    if ($result !== false) {
        // Obter o valor do campo 
        $priority_name = $result['priority_name'];

        return $priority_name;
    }

    // Casonão seja encontrado
    return "Nível de prioridade não encontrado para o ID fornecido";
}

public static function getHashtag($id_hashtag, $db)
{
    // Consultar o banco de dados para obter o valor do campo
    $query = "SELECT hashtag_name FROM Hashtag WHERE id_hashtag = :id";
    $stmt = $db->prepare($query);
    $stmt->execute(array(':id' => $id_hashtag));
    $result = $stmt->fetch();

    if ($result !== false) {
        // Obter o valor do campo
        $hashtag_name = $result['hashtag_name'];

        return $hashtag_name;
    }

    // Caso não seja encontrado
    return "Categoria não encontrado para o ID fornecido";
}

public static function getMessageTicket($ticket_id, PDO $db)
{
    $query = "SELECT * FROM TicketMessages WHERE ticket_id  = :id";
    $stmt = $db->prepare($query);
    $stmt->execute(array(':id' => $ticket_id));
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $messages;
}

static function addMessage($ticket_id, $message_text, $sender, $db){

    $stmt = $db->prepare('INSERT INTO TicketMessages(ticket_id, message_text, sender) VALUES (?, ?, ?);');
    $stmt->execute(array($ticket_id, $message_text, $sender));
}

function saveDepartment(PDO $db) {
    $stmt = $db->prepare('
      UPDATE Tickets SET id_department = ?
      WHERE id_ticket = ?
    ');

    $stmt->execute(array($this->id_department, $this->id_ticket));
}

function saveStatus(PDO $db) {
    $stmt = $db->prepare('
      UPDATE Tickets SET id_status = ?
      WHERE id_ticket = ?
    ');

    $stmt->execute(array($this->id_status, $this->id_ticket));
}

function saveAgent(PDO $db) {
    $stmt = $db->prepare('
      UPDATE Tickets SET id_assigned_agent = ?
      WHERE id_ticket = ?
    ');

    $stmt->execute(array($this->id_assigned_agent, $this->id_ticket));
}

function saveHashtag(PDO $db) {
    $stmt = $db->prepare('
      UPDATE Tickets SET id_hashtag = ?
      WHERE id_ticket = ?
    ');

    $stmt->execute(array($this->id_hashtag, $this->id_ticket));
}

// public static function getTicketHistory($ticket_id, $db)
// {
//     $query = "SELECT * FROM TicketHistory WHERE id_ticket = ?";  
//     $stmt = $db->prepare($query);
//     $stmt->execute(array(':id' => $ticket_id));
//     $history = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
//     return $history;
// }

}
?>