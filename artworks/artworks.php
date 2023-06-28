<?php

include "../Database/database.php";
include "../classes/interface.php";


class Artworks extends Db implements DbConnection
{
    public $tblname = "artworks";

    public function createTbl()
    {
        
        $table = "CREATE TABLE IF NOT EXISTS $this->tblname(
            id int primary key auto_increment,
            title varchar(200) not null,
            medium_used varchar(200) not null,
            artist varchar(200) not null
            )";

        $this->db();
        $this->conn->query($table);      
            
    }
    public function getid($getid)
    {
        if(!isset($getid['id']) || empty($getid['id']))
        {
            $response = [
                'code' => 102,
                'message' => 'Id is required'
            ];

            return json_encode($response);
        }
        $id = $getid['id'];

        $data = $this->conn->query("SELECT * FROM $this->tblname WHERE id='$id'");

        if($data->num_rows == 0)
        {
            $response = [
                "code" => 404,
                "message" => "Artwork Not Found!"
            ];
            return json_encode($response);
        }
        return json_encode($data->fetch_assoc());
    }

    public function search($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            return json_encode([
           'code'=> 'GET METHOD IS REQUIRED',
            ]);

       }
       $title = $params['title']?? '';
       $sql = "SELECT * FROM artworks where title like '%$title%'";
       
       $artworks = $this->conn->query($sql);

       if(empty($this->getError())){
        return json_encode($artworks->fetch_all(MYSQLI_ASSOC));

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
       $title = $params['title']?? '';
       $sql = "SELECT * FROM artworks where title like '%$title%'";
       
       $artworks = $this->conn->query($sql);

       if(empty($this->getError())){
        return json_encode($artworks->fetch_all(MYSQLI_ASSOC));

       }else {
           return json_encode([
               'code' => 500,
               'message' => $this->getError(), 
           ]);
       }
       
    }

    public function getAll()
    {
        $artworks = $this->conn->query("SELECT * FROM artworks");

        return json_encode($artworks->fetch_all(MYSQLI_ASSOC));
    }

    public function create($params)
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
             return json_encode([
            'code'=> 'POST METHOD IS REQUIRED',
        ]);

        }

        if(!isset($params['title']) || empty($params['title'])){
            return json_encode([
                'code'=> 'Title is required',
            ]);
        }
        if(!isset($params['medium_used']) || empty($params['medium_used'])){
            return json_encode([
                'code'=> 'Medium_Used is required',
            ]);
        }
        if(!isset($params['artist']) || empty($params['artist'])){
            return json_encode([
                'code'=> 'Artist is required',
            ]);
        }
       

        $title = $params['title'];
        $medium_used = $params['medium_used'];
        $artist = $params['artist'];
        

        $sql = "INSERT INTO artworks(title, medium_used, artist) VALUES('$title','$medium_used','$artist')";

        $added = $this->conn->query($sql);

        if($added){
            return json_encode([
                'code' => 200,
                'message' => 'The artwork successfully added', 
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
        if(!isset($params['title']) || empty($params['title'])){
            return json_encode([
                'code'=> 'Title is required',
            ]);
        }
        if(!isset($params['medium_used']) || empty($params['medium_used'])){
            return json_encode([
                'code'=> 'Medium_used is required',
            ]);
        }
        
        if(!isset($params['artist']) || empty($params['artist'])){
            return json_encode([
                'code'=> 'Artist is required',
            ]);
        }
        if(!isset($params['id']) || empty($params['id'])){
          return json_encode([
              'code'=> 'ID is required',
          ]);
      }
        
        $id = $params['id'];
        $title = $params['title'];
        $medium_used = $params['medium_used'];
        $artist = $params['artist'];
       

        $sql = "UPDATE artworks SET title = '$title', medium_used = '$medium_used', artist = '$artist'
        where id = '$id'";
        
        $updated = $this->conn->query($sql);

        if($updated){
            return json_encode([
                'code' => 200,
                'message' => 'The artwork successfully updated', 
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

       $sql = "DELETE FROM artworks where id = '$id'";
       
       $deleted = $this->conn->query($sql);

       if($deleted){
           return json_encode([
               'code' => 200,
               'message' => 'The artwork successfully deleted', 
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