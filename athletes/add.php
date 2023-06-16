<?php

include 'Athletes.php';

header("Content-type: application/json; charset=UTF-8");


// established connection to database;
$a  = new Athletes();
$a->setup();

if(!empty($_POST['first_name']))
{
    $a->insert($_POST['first_name'], $_POST['last_name']);
}

if($a)
{
    $response = [
        'code' => 200,
        'message' => 'atheletes added successfully'
    ];

} else {
    $response = [
        'code' => 404,
        'message' => 'atheletes added unsuccessfully'
    ];

}
    echo json_encode($response);
?>