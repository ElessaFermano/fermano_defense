<?php

include "artworks.php"; 
header("Content-type: application/json; charset=UTF-8");


//initialize user class
$artworks = new Artworks();

//connect to database and create table
$artworks->createTbl();

//call create method
echo $artworks->create($_POST);