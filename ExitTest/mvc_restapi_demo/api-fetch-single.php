<?php
//setting which type of data is passing
header('Content-Type: application/json');
//setting who can acess this api
header('Acess-Control-Allow-Origin: *');

//Storing input coming data from json format 
$data=json_decode(file_get_contents("php://input"),true);

$photo_id=$data['id'];

include "config.php";

$sql="SELECT * FROM photos WHERE id={$photo_id}";
$result=mysqli_query($conn,$sql) or die("SQL Query Failed");

if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message'=>'NO Record Found.','status'=>false));
}