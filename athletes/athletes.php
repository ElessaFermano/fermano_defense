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
            last_name varchar(200) not null,
            address text,
            gender varchar(200),
            age int,
            sport varchar(200),
            is_login varchar(5) not null default 0
            )";

        $this->db();
        $this->conn->query($table);      
            
    }
    public function search($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            return json_encode([
           'code'=> 'GET METHOD IS REQUIRED',
            ]);

       }
       $firstName = $params['first_name']?? '';
       $sql = "SELECT * FROM athletes where first_name like '%$firstName%'";
       
       $athletes = $this->conn->query($sql);

       if(empty($this->getError())){
        return json_encode($athletes->fetch_all(MYSQLI_ASSOC));

       }else {
           return json_encode([
               'code' => 500,
               'message' => $this->getError(), 
           ]);
       }
        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            return json_encode([
           'code'=> 'GET METHOD IS REQUIRED',
            ]);

       }
       $firstName = $params['first_name']?? '';
       $sql = "SELECT * FROM athletes where first_name like '%$firstName%'";
       
       $athletes = $this->conn->query($sql);

       if(empty($this->getError())){
        return json_encode($athletes->fetch_all(MYSQLI_ASSOC));

       }else {
           return json_encode([
               'code' => 500,
               'message' => $this->getError(), 
           ]);
       }
       
    }

    public function getAll()
    {
        $athletes = $this->conn->query("SELECT * FROM athletes");

        return json_encode($athletes->fetch_all(MYSQLI_ASSOC));
    }

    public function create($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
             return json_encode([
            'code'=> 'POST METHOD IS REQUIRED',
        ]);

        }

        if(!isset($params['first_name']) || empty($params['first_name'])){
            return json_encode([
                'code'=> 'First Name is required',
            ]);
        }
        if(!isset($params['last_name']) || empty($params['last_name'])){
            return json_encode([
                'code'=> 'Last Name is required',
            ]);
        }
        if(!isset($params['address']) || empty($params['address'])){
            return json_encode([
                'code'=> 'Address is required',
            ]);
        }
        if(!isset($params['gender']) || empty($params['gender'])){
            return json_encode([
                'code'=> 'Gender is required',
            ]);
        }
        if(!isset($params['age']) || empty($params['age'])){
            return json_encode([
                'code'=> 'Age is required',
            ]);
        }
        if(!isset($params['sport']) || empty($params['sport'])){
            return json_encode([
                'code'=> 'Sport is required',
            ]);
        }

        $firstName = $params['first_name'];
        $lastName = $params['last_name'];
        $address = $params['address'];
        $gender = $params['gender'];
        $age = $params['age'];
        $sport = $params['sport'];

        $sql = "INSERT INTO athletes(first_name, last_name, address, gender, age, sport) VALUES('$firstName','$lastName','$address','$gender','$age','$sport')";

        $added = $this->conn->query($sql);

        if($added){
            return json_encode([
                'code' => 200,
                'message' => 'The athlete successfully added', 
            ]);
        }else {
            return json_encode([
                'code' => 500,
                'message' => $this->getError(), 
            ]);
        }
    }

    public function update($params)
    {
        if(!isset($params['first_name']) || empty($params['first_name'])){
            return json_encode([
                'code'=> 'First Name is required',
            ]);
        }
        if(!isset($params['last_name']) || empty($params['last_name'])){
            return json_encode([
                'code'=> 'Last Name is required',
            ]);
        }
        if(!isset($params['id']) || empty($params['id'])){
            return json_encode([
                'code'=> 'ID is required',
            ]);
        }
        if(!isset($params['address']) || empty($params['address'])){
            return json_encode([
                'code'=> 'Address is required',
            ]);
        }
        if(!isset($params['gender']) || empty($params['gender'])){
            return json_encode([
                'code'=> 'Gender is required',
            ]);
        }
        if(!isset($params['age']) || empty($params['age'])){
            return json_encode([
                'code'=> 'Age is required',
            ]);
        }
        if(!isset($params['sport']) || empty($params['sport'])){
            return json_encode([
                'code'=> 'Sport is required',
            ]);
        }
        $id = $params['id'];
        $firstName = $params['first_name'];
        $lastName = $params['last_name'];
        $address = $params['address'];
        $gender = $params['gender'];
        $age = $params['age'];
        $sport = $params['sport'];

        $sql = "UPDATE athletes SET first_name = '$firstName', last_name = '$lastName', address = '$address', gender = '$gender', age = '$age', sport = '$sport'
        where id = '$id'";
        
        $updated = $this->conn->query($sql);

        if($updated){
            return json_encode([
                'code' => 200,
                'message' => 'The athlete successfully updated', 
            ]);
        }else {
            return json_encode([
                'code' => 500,
                'message' => $this->getError(), 
            ]);
        }

    }

    public function delete($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            return json_encode([
           'code'=> 'GET METHOD IS REQUIRED',
            ]);

       }
       if(!isset($params['id']) || empty($params['id'])){
        return json_encode([
            'code'=> 'ID is required',
        ]);
    }
       $id = $params['id'];

       $sql = "DELETE FROM athletes where id = '$id'";
       
       $deleted = $this->conn->query($sql);

       if($deleted){
           return json_encode([
               'code' => 200,
               'message' => 'The athlete successfully deleted', 
           ]);
       }else {
           return json_encode([
               'code' => 500,
               'message' => $this->getError(), 
           ]);
       }
    }
}
?>