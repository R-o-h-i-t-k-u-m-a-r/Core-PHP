<?php


require 'app/controllers/AuthController.php';
require 'app/controllers/TaskController.php';

$authController = new AuthController();
$taskController = new TaskController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

// Include the required controller based on the action
switch ($action) {
    case 'register':
        $authController->register();
        break;
    case 'login':
        $authController->login();
        break;
    
    case 'logout':
        $authController->logout();
        break;
    case 'createTask':
        $taskController->createTask();
        break;
    case 'viewTasks':
        $taskController->viewTasks();
        break;
    case 'editTask':
        $id = $_GET['id'];
        $taskController->editTask($id);
        break;
    case 'updateTask':
        $taskController->updateTask($_POST);
        break;
    case 'deleteTask':
        $id = $_GET['id'];
        $taskController->deleteTask($id);
        break;
    default:
        // Default action
        $authController->register();
        break;
}
?>
