<?php
include "../classes/abstract.php";

class Db extends Database
{
    public $conn;
    public $sname = "localhost";
    public $uname = "root";
    public $pass = "";
    public $dbname = "Pino_Fermano_OOP";

    public function db()
    {
        $this->conn = new MYSQLI($this->sname, $this->uname, $this->pass);
        $tb = " CREATE DATABASE IF NOT EXISTS $this->dbname";    
        $this->conn->query($tb);

        $use = "USE $this->dbname";
        $this->conn->query($use);

    }
    public function getError()
    {
        return $this->conn->error;
    }
}


?>