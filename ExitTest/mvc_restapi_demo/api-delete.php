<?php
//setting which type of data is passing
header('Content-Type: application/json');
//setting who can acess this api
header('Acess-Control-Allow-Origin: *');
//setting request method for this api
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,    Access-Control-Allow-Methods, Authorization, X-Requested-With');

//Storing input coming data from json format 
$data=json_decode(file_get_contents("php://input"),true);

$photo_id=$data['id'];

include "config.php";

$sql="DELETE FROM photos WHERE id={$photo_id}";


if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Record Deleted.','status'=>true));
}else{
    echo json_encode(array('message'=>'Record Not Deleted.','status'=>false));
}