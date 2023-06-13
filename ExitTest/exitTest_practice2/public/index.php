<?php

//$requestedUrl = $_SERVER['REQUEST_URI'];
$action = isset($_GET['action']) ? $_GET['action'] : '';

require_once '../config/database.php';

if ($action === 'register') {
    require_once '../app/controllers/AuthController.php';
    $authController = new AuthController($conn);
    $authController->register();
} elseif ($action === 'login') {
    require_once '../app/controllers/AuthController.php';
    $authController = new AuthController($conn);
    $authController->login();
} elseif ($action === 'logout') {
    require_once '../app/controllers/AuthController.php';
    $authController = new AuthController($conn);
    $authController->logout();
} elseif ($action === 'task') {
    session_start();
    if (isset($_SESSION['user_id'])) {
        require_once '../app/controllers/TaskController.php';
        $taskController = new TaskController($conn);
        $taskController->index();
    } else {
        header('Location: /login.php');
        exit;
    }
} elseif ($action === '/task/create.php') {
    session_start();
    if (isset($_SESSION['user_id'])) {
        require_once '../app/controllers/TaskController.php';
        $taskController = new TaskController($conn);
        $taskController->create();
    } else {
        header('Location: /login.php');
        exit;
    }
} elseif ($action === '/task/edit.php') {
    session_start();
    if (isset($_SESSION['user_id'])) {
        require_once '../app/controllers/TaskController.php';
        $taskController = new TaskController($conn);
        $taskController->edit();
    } else {
        header('Location: /login.php');
        exit;
    }
} elseif ($action === '/task/delete.php') {
    session_start();
    if (isset($_SESSION['user_id'])) {
        require_once '../app/controllers/TaskController.php';
        $taskController = new TaskController($conn);
        $taskController->delete();
    } else {
        header('Location: /login.php');
        exit;
    }
} else {
    require '../app/controllers/AuthController.php';
        $authController = new AuthController($conn);
        $authController->register();
    exit;
}
