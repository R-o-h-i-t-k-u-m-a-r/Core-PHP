<?php
require_once 'repositories/TaskRepositoryInterface.php';
require_once 'repositories/MySQLiTaskRepository.php';

class TaskService
{
    private $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new MySQLiTaskRepository();
    }

    public function getAllTasks()
    {
        return $this->taskRepository->getAllTasks();
    }

    public function getTaskById($id)
    {
        return $this->taskRepository->getTaskById($id);
    }

    public function createTask($title, $task, $task_status)
    {
        return $this->taskRepository->createTask($title, $task, $task_status);
    }

    public function updateTask($id, $title, $task, $task_status)
    {
        return $this->taskRepository->updateTask($id, $title, $task, $task_status);
    }

    public function deleteTask($id)
    {
        return $this->taskRepository->deleteTask($id);
    }
}
?>
