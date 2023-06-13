<?php
class TaskController
{
    private $taskModel;

    public function __construct(Task $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function index()
    {
        $tasks = $this->taskModel->getAllTasks();
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

        $this->taskModel->createTask($title, $task, $task_status);
        header('Location: index.php');
    }

    public function edit($id)
    {
        $task = $this->taskModel->getTaskById($id);
        require_once('views/edit.php');
    }

    public function update($data)
    {
        $id = $data['id'];
        $title = $data['title'];
        $task = $data['task'];
        $task_status = $data['task_status'];

        $this->taskModel->updateTask($id, $title, $task, $task_status);
        header('Location: index.php');
    }

    public function delete($id)
    {
        $this->taskModel->deleteTask($id);
        header('Location: index.php');
    }
}
?>
