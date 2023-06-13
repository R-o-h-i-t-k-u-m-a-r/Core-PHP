<?php
class Task
{
    private $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function getAllTasks()
    {
        $query = "SELECT * FROM task_management";
        $result = $this->db->query($query);

        $tasks = [];
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }

        return $tasks;
    }

    public function getTaskById($id)
    {
        $id = $this->db->real_escape_string($id);

        $query = "SELECT * FROM task_management WHERE id = $id";
        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }

    public function createTask($title, $task, $task_status)
    {
        $title = $this->db->real_escape_string($title);
        $task = $this->db->real_escape_string($task);
        $task_status = $this->db->real_escape_string($task_status);
        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO task_management (title, task, task_status, created_at) VALUES ('$title', '$task', '$task_status', '$created_at')";
        return $this->db->query($query);
    }

    public function updateTask($id, $title, $task, $task_status)
    {
        $id = $this->db->real_escape_string($id);
        $title = $this->db->real_escape_string($title);
        $task = $this->db->real_escape_string($task);
        $task_status = $this->db->real_escape_string($task_status);

        $query = "UPDATE task_management SET title = '$title', task = '$task', task_status = '$task_status' WHERE id = $id";
        return $this->db->query($query);
    }

    public function deleteTask($id)
    {
        $id = $this->db->real_escape_string($id);

        $query = "DELETE FROM task_management WHERE id = $id";
        return $this->db->query($query);
    }
}
?>
