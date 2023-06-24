<?php

include "athletes.php"; 
header("Content-type: application/json; charset=UTF-8");


//initialize user class
$athletes = new Athletes();

//connect to database and create table
$athletes->createTbl();

//call get table
echo $athletes->update($_POST);