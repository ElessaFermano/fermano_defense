<?php

 abstract class Database
{
    public $conn;
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "api_final";
   
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
          
    }
    abstract public function createDB(): string;
}

?>