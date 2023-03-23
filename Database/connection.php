<?php
declare (strict_typer = 1);

function getDatabaseConnection() : PDO {
  $db = new PDO('sqlite:' . __DIR__ . '/../Database/ticketsWebsite.db');

  return $db;
}
?>      