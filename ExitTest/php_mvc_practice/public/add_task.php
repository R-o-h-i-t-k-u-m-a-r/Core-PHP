<?php

//require_once '../app/controllers/TaskController.php';
//require_once '../app/database/database.php';

require_once 'C:\xampp\htdocs\php_mvc_chatGpt\app\controllers\TaskController.php';
require_once 'C:\xampp\htdocs\php_mvc_chatGpt\database\database.php';

$controller = new TaskController();

// Handle the add task request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $controller->addTask();
} else {
    echo "Invalid request";
}
