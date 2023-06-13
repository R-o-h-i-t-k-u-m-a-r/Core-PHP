<?php
require_once 'app/config/Database.php';
require_once 'app/models/Task.php';
require_once 'app/repositories/TaskRepositoryInterface.php';

class MySQLiTaskRepository implements TaskRepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTasks()
    {
        $mysqli = $this->db->getConnection();
   
    }

    public function validateTask($task) {
        // Perform validation logic for the task fields
    }

    public function createTask($task)
    {
        $mysqli = $this->db->getConnection();

        // Sanitize the input
        $title = $mysqli->real_escape_string($task->getTitle());
        $description = $mysqli->real_escape_string($task->getDescription());
        $completedBy = $mysqli->real_escape_string($task->getCompletedBy());
        $completedOn = $mysqli->real_escape_string($task->getCompletedOn());
        $status = $mysqli->real_escape_string($task->getStatus());

        // Insert the task into the database
        $query = "INSERT INTO tasks (title, description, completed_by, completed_on, status)
                  VALUES ('$title', '$description', '$completedBy', '$completedOn', '$status')";
        $result = $mysqli->query($query);

        if ($result) {
            echo "Task created successfully!";
            header('Location: index.php?action=viewTasks');
        } else {
            echo "Failed to create task.";
        }

    }

    public  function getTasksByUser($userId)
    {
        $mysqli = $this->db->getConnection();

        // Sanitize the input
        $userId = $mysqli->real_escape_string($userId);

        // Retrieve tasks for the specified user from the database
        $query = "SELECT * FROM tasks WHERE completed_by = '$userId'";
        $result = $mysqli->query($query);

        $tasks = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
        }

        return $tasks;
    }

    public function getTaskByUserId($id)
    {
        $mysqli = $this->db->getConnection();
        
        //Sanitize the input
        $id = $mysqli->real_escape_string($id);

        // Retrieve task for the specified userId from the database
        $query = "SELECT * FROM tasks WHERE id = '$id'";
        $result = $mysqli->query($query);

        return $result->fetch_assoc();
    }

    public function updateTask($id,$task)
    {
        $mysqli = $this->db->getConnection();

        // Sanitize the input
        $title = $mysqli->real_escape_string($task->getTitle());
        $description = $mysqli->real_escape_string($task->getDescription());
        $completedBy = $mysqli->real_escape_string($task->getCompletedBy());
        $completedOn = $mysqli->real_escape_string($task->getCompletedOn());
        $status = $mysqli->real_escape_string($task->getStatus());

        $query = "UPDATE tasks SET title = '$title', description = '$description', completed_by = '$completedBy', completed_on = '$completedOn', status = '$status' WHERE id = $id";

        $result = $mysqli->query($query);

        if ($result) {
            echo "Task Updated successfully!";
            header('Location: index.php?action=viewTasks');
        } else {
            echo "Failed to Update task.";
        }
    }

    public function deleteTask($id)
    {
        $mysqli = $this->db->getConnection();

        // Sanitize the input
        $id = $mysqli->real_escape_string($id);

        $query = "DELETE FROM tasks WHERE id = $id";

        $result = $mysqli->query($query);

        if ($result) {
            echo "Task Deleted successfully!";
            header('Location: index.php?action=viewTasks');
        } else {
            echo "Failed to Delete Task.";
        }
    }
}
?>
