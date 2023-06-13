<?php
require_once 'models/Database.php';
require_once 'repositories/TaskRepositoryInterface.php';

class MySQLiTaskRepository implements TaskRepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTasks()
    {
        $db = $this->db->getConnection();
        // Implementing logic to fetch all photos from the database using MySQLi
        $query = "SELECT * FROM task_management";
        $result = $db->query($query);

        $tasks = [];
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }

        return $tasks;
    }

    public function getTaskById($id)
    {
        $db = $this->db->getConnection();
        // Implementing logic to fetch a specific photo from the database using MySQLi
        $id = $db->real_escape_string($id);

        $query = "SELECT * FROM task_management WHERE id = $id";
        $result = $db->query($query);

        return $result->fetch_assoc();
    }

    public function createTask($title, $task, $task_status)
    {
        $db = $this->db->getConnection();
        // Implementing logic to add a new photo to the database using MySQLi
        $title = $db->real_escape_string($title);
        $task = $db->real_escape_string($task);
        $task_status = $db->real_escape_string($task_status);
        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO task_management (title, task, task_status, created_at) VALUES ('$title', '$task', '$task_status', '$created_at')";
        return $db->query($query);
    }

    public function updateTask($id, $title, $task, $task_status)
    {
        $db = $this->db->getConnection();
        // Implementing logic to update a specific photo in the database using MySQLi
        $id = $db->real_escape_string($id);
        $title = $db->real_escape_string($title);
        $task = $db->real_escape_string($task);
        $task_status = $db->real_escape_string($task_status);

        $query = "UPDATE task_management SET title = '$title', task = '$task', task_status = '$task_status' WHERE id = $id";
        return $db->query($query);
    }

    public function deleteTask($id)
    {
        $db = $this->db->getConnection();
        // Implementing logic to delete a specific photo from the database using MySQLi
        $id = $db->real_escape_string($id);

        $query = "DELETE FROM task_management WHERE id = $id";
        return $db->query($query);
    }
}
?>
