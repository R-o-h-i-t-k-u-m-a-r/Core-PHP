<?php

//require_once '../app/controllers/TaskController.php';
//require_once '../app/database/database.php';

require_once 'C:\xampp\htdocs\php_mvc_chatGpt\app\controllers\TaskController.php';
require_once 'C:\xampp\htdocs\php_mvc_chatGpt\database\database.php';

$controller = new TaskController();

// Handle the delete task request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $controller->deleteTask();
} else {
    echo "Invalid request";
}
