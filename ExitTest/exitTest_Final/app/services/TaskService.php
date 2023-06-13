<?php
require_once 'app/repositories/TaskRepositoryInterface.php';
require_once 'app/dao/MySQLiTaskRepository.php';

class TaskService
{
    private $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new MySQLiTaskRepository();
    }

    public function validateTask($task)
    {
        return $this->taskRepository->validateTask($task);
    }

    public function createTask($task)
    {
        return $this->taskRepository->createTask($task);
    }

    public function getTasksByUser($userId)
    {
        return $this->taskRepository->getTasksByUser($userId);
    }

    public function getTaskByUserId($id)
    {
        return $this->taskRepository->getTaskByUserId($id);
    }

    public function updateTask($id,$task)
    {
        return $this->taskRepository->updateTask($id,$task);
    }
    public function deleteTask($id)
    {
        return $this->taskRepository->deleteTask($id);
    }
}
?>
