<?php

class Database
{
    public $conn;
    public $sname = "localhost";
    public $uname = "root";
    public $pass = "";
    public $dbname = "final_oop";

    public function db()
    {
        $this->conn = new MYSQLI($this->sname, $this->uname, $this->pass);
        $tb = " CREATE DATABASE IF NOT EXISTS $this->dbname";    
        $this->conn->query($tb);

        $use = "USE $this->dbname";
        $this->conn->query($use);
        
        // echo "11";
    }
}


?>