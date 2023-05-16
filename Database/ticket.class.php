<?php
  declare(strict_types = 1);

  class Ticket {
    public int $id_ticket;
    public int $id_user;
    public string $the_subject;
    public int $id_department;
    public string $ticket_date;
    public int $id_assigned_agent;
    public int $id_status;
    public string $message;
    public int $id_priority;


    public function __construct(int $id_ticket, int $id_user, string $the_subject, string $ticket_date, int $id_department, int $id_assigned_agent, int $id_status, string $message, int $id_priority)
    {
      $this->id_ticket = $id_ticket;
      $this->id_user = $id_user;
      $this->the_subject = $the_subject;
      $this->ticket_date = $ticket_date;
      $this->id_department = $id_department;
      $this->id_assigned_agent = $id_assigned_agent;
      $this->id_status = $id_status;
      $this->message = $message;
      $this->id_priority = $id_priority;
    }

    static function addTicket($id_user, $the_subject, $ticket_date, $id_department, $id_assigned_agent, $id_status, $message, $id_priority, $db){

      $stmt = $db->prepare('INSERT INTO Tickets (id_user, the_subject, ticket_date, id_department, id_assigned_agent, id_status, message, id_priority) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');
      $stmt->execute(array($id_user, $the_subject, $ticket_date, $id_department, $id_assigned_agent, $id_status, $message, $id_priority));
  }



    // static function getAgentTickets(PDO $db, int $id) : array {
    //   $stmt = $db->prepare('
    //     SELECT AlbumId, Title, COUNT(*) AS tracks, SUM(Milliseconds) AS length, ArtistId
    //     FROM Album JOIN Track USING (AlbumId)
    //     WHERE ArtistId = ?
    //     GROUP BY AlbumId
    //   ');
    //   $stmt->execute(array($id));

    //   $albums = array();

    //   while ($album = $stmt->fetch()) {
    //     $albums[] = new Album(
    //       $album['AlbumId'],
    //       $album['Title'],
    //       $album['tracks'],
    //       intval(round($album['length'] / 1000 / 60)),
    //       $album['ArtistId']
    //     );
    //   }

    //   return $albums;
    // }

//     static function getTicket(PDO $db, int $id) : Ticket {
//       $stmt = $db->prepare('
//         SELECT AlbumId, Title, COUNT(*) AS tracks, SUM(Milliseconds) AS length, ArtistId
//         FROM Album JOIN Track USING (AlbumId)
//         WHERE AlbumId = ?
//         GROUP BY AlbumId
//       ');
//       $stmt->execute(array($id));

//       $album = $stmt->fetch();

//       return new Album(
//         $album['AlbumId'],
//         $album['Title'],
//         $album['tracks'],
//         intval(round($album['length'] / 1000 / 60)),
//         $album['ArtistId']
//       );
//     }

//     function save(PDO $db) {
//       $stmt = $db->prepare('
//         UPDATE ALBUM SET Title = ?
//         WHERE AlbumId = ?
//       ');

//       $stmt->execute(array($this->title, $this->id));
//     }

}
?>