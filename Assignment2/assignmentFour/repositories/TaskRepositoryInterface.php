<?php
interface TaskRepositoryInterface
{
    public function getAllTasks();
    public function getTaskById($id);
    public function createTask($title, $task, $task_status);
    public function updateTask($id, $title, $task, $task_status);
    public function deleteTask($id);
}
?>
