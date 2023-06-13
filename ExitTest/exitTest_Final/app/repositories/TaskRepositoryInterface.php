<?php
require 'app/models/Task.php';

interface TaskRepositoryInterface
{
    public function validateTask($task);
    public function createTask($task);
    public function getTasksByUser($userId);
    public function getTaskByUserId($id);
    public function updateTask($id,$task);
    public function deleteTask($id);
}
?>
