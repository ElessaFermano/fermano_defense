<?php

include 'Athletes.php';

header("Content-type: application/json; charset=UTF-8");


$d = new Athletes();
$d->createTbl();

if(!empty($_POST['id']))
{
    $d->delete($_POST['id']);
}

if($d)
{
    $response = [
        'code' => 200,
        'message' => 'atheletes deleted successfully'
    ];

} else {
    $response = [
        'code' => 404,
        'message' => 'atheletes deleted unsuccessfully'
    ];

}
    echo json_encode($response);
?>