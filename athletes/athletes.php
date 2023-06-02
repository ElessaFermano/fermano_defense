<?php

include "../Database/database.php";


class Athletes extends Db implements Table
{
    public $tblname = "Athletes";

    public function createTbl()
    {
        $table = "CREATE TABLE IF NOT EXISTS $this->tblname(
            id int primary key auto_increment,
            first_name varchar(200) not null,
            last_name varchar(200) not null,
            sport text not null
            )";
            
            $this->connect();
            $this->conn->query($table);
    }
}

?>