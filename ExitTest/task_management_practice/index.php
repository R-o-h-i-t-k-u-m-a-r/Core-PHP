<?php
require_once('config/database.php');
require_once('models/Task.php');
require_once('controllers/TaskController.php');

$taskModel = new Task($db);
$taskController = new TaskController($taskModel);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($action === 'index') {
    $taskController->index();
} elseif ($action === 'create') {
    $taskController->create();
} elseif ($action === 'store') {
    $taskController->store($_POST);
} elseif ($action === 'edit') {
    $id = $_GET['id'];
    $taskController->edit($id);
} elseif ($action === 'update') {
    $taskController->update($_POST);
} elseif ($action === 'delete') {
    $id = $_GET['id'];
    $taskController->delete($id);
}
?>
