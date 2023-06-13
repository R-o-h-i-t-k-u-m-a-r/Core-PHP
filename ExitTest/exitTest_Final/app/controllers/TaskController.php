<?php

//require 'app/models/Task.php';
require_once 'app/services/TaskService.php';

class TaskController {

    private $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
    }
    public function createTask() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $title = $_POST['title'];
            $description = $_POST['description'];
            $completedBy = $_SESSION['user_id'];
            $completedOn = $_POST['completedOn'];
            $status = $_POST['status'];

            // Create a new Task instance
            $task = new Task($title, $description, $completedBy, $completedOn, $status);

            // Validate and create the task
            $this->taskService->validateTask($task);
            $this->taskService->createTask($task);
        } else {
            $this->showTaskForm();
        }
    }

    public function viewTasks() {
        // Retrieve tasks for the logged-in user
        session_start();

        //Validate User is Logged-In or Not
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
        {
            header("location: index.php?action=login");
        }
        else
        {
            $tasks = $this->taskService->getTasksByUser($_SESSION['user_id']);
            require 'app/views/task/index.php';
        }
    }

    function editTask($id)
    {
        $task = $this->taskService->getTaskByUserId($id);
        require 'app/views/task/edit.php';
    }

    function updateTask($data)
    {
        session_start();
        $title = $data['title'];
        $description = $data['description'];
        $completedBy = $_SESSION['user_id'];
        $completedOn = $data['completedOn'];
        $status = $data['status'];

         // Create a new Task instance
         $task = new Task($title, $description, $completedBy, $completedOn, $status);

        
         $this->taskService->updateTask($data['id'],$task);
        
    }

    function deleteTask($id)
    {
        $this->taskService->deleteTask($id);
    }
    public function showTaskForm() {
        require 'app/views/task/create.php';
    }
}
?>
