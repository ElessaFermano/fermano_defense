<?php

include 'db.php';

class Players extends Database
{
    public function createDB(): string 
    {
        $db = "CREATE DATABASE IF NOT EXISTS $this->dbname";
        $this->conn->query($db);
    }
}

$d = new Players;
$d->createDB();
?>