<?php
//setting which type of data is passing
header('Content-Type: application/json');
//setting who can acess this api
header('Access-Control-Allow-Origin: *');
//setting request method for this api
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,    Access-Control-Allow-Methods, Authorization, X-Requested-With');

//Storing input coming data from json format to array type
$data=json_decode(file_get_contents("php://input"),true);

$photo_id=$data['id'];
$photo_title=$data['title'];
$photo_description=$data['description'];
$photo_image=$data['image'];

include "config.php";

$sql= "UPDATE photos SET title='{$photo_title}',description='{$photo_description}',image='{$photo_image}' WHERE id={$photo_id}";


if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Photo Record Updatated.','status'=>true));
}else{
    echo json_encode(array('message'=>'Photo Record Not Updated.','status'=>false));
}