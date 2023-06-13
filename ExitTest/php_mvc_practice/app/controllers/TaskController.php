<?php

//require_once '../models/TaskModel.php';
require_once 'C:\xampp\htdocs\php_mvc_chatGpt\app\models\TaskModel.php';

class TaskController {
    private $model;

    public function __construct() {
        $this->model = new TaskModel($GLOBALS['conn']);
    }

    public function index() {
        $tasks = $this->model->getAllTasks();
        //include '../views/task_list.php';
        include 'C:\xampp\htdocs\php_mvc_chatGpt\app\views\task_list.php';
    }

    public function addTask() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $this->model->addTask($title, $description);
        }

        header("Location: index.php");
    }

    public function editTask() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];

            // Get the task details and pass them to the view for editing
            $task = $this->model->getTaskById($id);
            include include 'C:\xampp\htdocs\php_mvc_chatGpt\app\views\edit_task.php';
        }
    }

    public function updateTask() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            $this->model->updateTask($id, $title, $description);
        }

        header("Location: index.php");
    }

    public function deleteTask() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];

            $this->model->deleteTask($id);
        }

        header("Location: index.php");
    }
}
