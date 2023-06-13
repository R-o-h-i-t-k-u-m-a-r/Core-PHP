<?php

require_once 'models/Task.php';

class TaskController
{
    private $taskModel;

    public function __construct($conn)
    {
        $this->taskModel = new Task($conn);
    }

    public function index()
    {
        // Retrieve the logged-in user ID from the session
        session_start();
        $userId = $_SESSION['user_id'];

        // Get the tasks for the logged-in user
        $tasks = $this->taskModel->getTasksByUserId($userId);

        // Display the task list
        require_once 'views/task/index.php';
    }

    public function create()
    {
        // Handle the task creation form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $userId = $_SESSION['user_id'];

            $title = $_POST['title'];
            $description = $_POST['description'];

            $created = $this->taskModel->createTask($title, $description, $userId);

            if ($created) {
                // Redirect to the task list upon successful creation
                header('Location: /task.php');
                exit;
            } else {
                // Handle the creation failure, e.g., display an error message
            }
        }

        // Display the task creation form
        require_once 'views/task/create.php';
    }

    public function edit()
    {
        // Handle the task editing form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $taskId = $_POST['task_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            $updated = $this->taskModel->updateTask($taskId, $title, $description);

            if ($updated) {
                // Redirect to the task list upon successful update
                header('Location: /task.php');
                exit;
            } else {
                // Handle the update failure, e.g., display an error message
            }
        }

        // Retrieve the task ID from the query string
        $taskId = $_GET['task_id'];

        // Get the task details
        $task = $this->taskModel->getTaskById($taskId);

        // Display the task editing form
        require_once 'views/task/edit.php';
    }

    public function delete()
    {
        // Handle the task deletion
        $taskId = $_GET['task_id'];

        $deleted = $this->taskModel->deleteTask($taskId);

        if ($deleted) {
            // Redirect to the task list upon successful deletion
            header('Location: /task.php');
            exit;
        } else {
            // Handle the deletion failure, e.g., display an error message
        }
    }
}
