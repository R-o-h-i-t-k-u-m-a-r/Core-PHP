<?php

//require_once '../app/controllers/TaskController.php';
//require_once '../app/database/database.php';

require_once 'C:\xampp\htdocs\php_mvc_chatGpt\app\controllers\TaskController.php';
require_once 'C:\xampp\htdocs\php_mvc_chatGpt\database\database.php';

$controller = new TaskController();

// Handle the edit task request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $controller->editTask();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $controller->updateTask();
} else {
    echo "Invalid request";
}
