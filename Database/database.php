<?php

include "../call/classes.php";

class Db extends Database
{
    public $conn;
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "api_final";
   
    public function connect()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        $this->conn->query("CREATE DATABASE IF NOT EXISTS $this->dbname");
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
 
}

?>