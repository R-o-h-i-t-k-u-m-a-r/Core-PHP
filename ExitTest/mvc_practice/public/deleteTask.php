<?php

//require_once '../app/controllers/TaskController.php';
//require_once '../app/database/database.php';

//require_once '../config/database.php';
require_once 'C:\xampp\htdocs\mvc_practice\config\database.php';
//require_once '../core/Database.php';
require_once 'C:\xampp\htdocs\mvc_practice\core\Database.php';
//require_once '../app/models/PhotoModel.php';
require_once 'C:\xampp\htdocs\mvc_practice\app\models\PhotoModel.php';
//require_once '../app/controllers/PhotoController.php';
require_once 'C:\xampp\htdocs\mvc_practice\app\controllers\PhotoController.php';

$db = new Database($hostname, $username, $password, $dbname);
$model = new PhotoModel($db);

// Handle the delete task request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $model->deletePhoto($id);
    header('Location: index.php');
    
} else {
    echo "Invalid request";
}
