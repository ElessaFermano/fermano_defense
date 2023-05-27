<?php

include "../Database/database.php";


class Athletes extends Database
{

    public function createTbl()
    {
        $table = "CREATE TABLE IF NOT EXISTS athletes(
            id int primary key auto_increment,
            first_name varchar(200) not null,
            last_name varchar(200) not null,
            position text not null,
            salary float(6) not null
            )";

            $this->conn->query($table);
    }
}

?>