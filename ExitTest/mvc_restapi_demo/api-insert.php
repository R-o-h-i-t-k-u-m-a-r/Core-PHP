<?php
//setting which type of data is passing
header('Content-Type: application/json');
//setting who can acess this api
header('Access-Control-Allow-Origin: *');
//setting request method for this api
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,    Access-Control-Allow-Methods, Authorization, X-Requested-With');

//Storing input coming data from json format to array type
$data=json_decode(file_get_contents("php://input"),true);

$photo_title=$data['title'];
$photo_description=$data['description'];
$photo_image=$data['image'];

include "config.php";

$sql= "INSERT INTO photos(title, description, image) VALUES ('{$photo_title}','{$photo_description}','{$photo_image}')";


if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Photo Record Inserted.','status'=>true));
}else{
    echo json_encode(array('message'=>'Photo Record Not Inserted.','status'=>false));
}