<?php
$conn=mysqli_connect("localhost","root","password","php_trip");

$request=$_SERVER['REQUEST_METHOD'];

$data=array();
//print($request);
switch ($request) {
    case 'GET':
        response(getData());
        break;
    case 'POST':
        response(addData());
    case 'PUT':
        response(updateData());
    default:
        # code...
        break;
}

function getData(){
    global $conn;

    if(@$_GET['id']){
        @$id=$_GET['id'];

       $where="where id=".$id;
    }else{
        $id=0;
        $where="";
    }
    $query=mysqli_query($conn,"select * from photos".$where);
    while($row=mysqli_fetch_assoc($query)) {
        $data[]=array("id"=>$row['id'],"title"=>$row['title'],"description"=>$row['description'],"image"=>$row['image']);
    }
    return $data;
}

function addData()
{
    global $conn;

    $query=mysqli_query($conn,"insert into photos(title,description,image)values('".$_POST['title']."','".$_POST['description']."','".$_POST['image']."')");

    if($query==true){
        $data[]=array("Message"=>"Created");
    }
    else{
        $data[]=array("Message"=>"Not Created");
    }
    return $data;
}

function updateData()
{
    global $conn;
    
    parse_str(file_get_contents('php://input'),$_PUT);
    print_r($_PUT);
}
function response($data)
{
    echo json_encode($data);
}
