<?php

include "../Database/database.php";


class Athletes extends Database
{
    public $tblname = "Athletes";

    public function createTbl()
    {
        
        $table = "CREATE TABLE IF NOT EXISTS $this->tblname(
            id int primary key auto_increment,
            first_name varchar(200) not null,
            last_name varchar(200) not null
            )";

        $this->db();
        $this->conn->query($table);      
            
    }

    public function setup()
    {
        $this->db();
        $this->createTbl();
        // echo "11";
    }

    public function insert($first_name, $last_name)
    {
        $insert = "INSERT INTO $this->tblname (id, first_name, last_name)
        VALUES (NULL, '$first_name','$last_name')";
        $this->conn->query($insert);
        // var_dump($this->conn->error);  
    }

    public function delete($id)
    {
        $delete = "DELETE FROM $this->tblname WHERE id = $id";
        $this->conn->query($delete);
    }
}

?>