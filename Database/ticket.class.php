<?php
  declare(strict_types = 1);

  class Ticket {
    public int $id;
    public int $client;
    public int $department;
    public string $ticket_date;
    public int $agent;
    public int $status;
    public int $priority;
    public string $hastag;


    public function __construct(int $id, int $client, int $department, string $ticket_date, int $assigned_agent, int $status, int $priority, string $hastag)
    {
      $this->id = $id;
      $this->client = $client;
      $this->department = $department;
      $this->ticket_date = $ticket_date;
      $this->agent = $agent;
      $this->status = $status;
      $this->priority = $priority;
      $this->hashtag = $hashtag;
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