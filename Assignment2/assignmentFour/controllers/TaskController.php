<?php
require_once 'services/TaskService.php';
class TaskController
{
    private $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        require_once('views/index.php');
        //include 'views/index.php';
    }

    public function create()
    {
        require_once('views/create.php');
    }

    public function store($data)
    {
        $title = $data['title'];
        $task = $data['task'];
        $task_status = $data['task_status'];

        $this->taskService->createTask($title, $task, $task_status);
        header('Location: index.php');
    }

    public function edit($id)
    {
        $task = $this->taskService->getTaskById($id);
        require_once('views/edit.php');
    }

    public function update($data)
    {
        $id = $data['id'];
        $title = $data['title'];
        $task = $data['task'];
        $task_status = $data['task_status'];

        $this->taskService->updateTask($id, $title, $task, $task_status);
        header('Location: index.php');
    }

    public function delete($id)
    {
        $this->taskService->deleteTask($id);
        header('Location: index.php');
    }
}
?>
