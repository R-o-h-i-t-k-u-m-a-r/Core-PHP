<?php

class Task
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createTask($title, $description, $completedBy)
    {
        // Prepare and execute the SQL query to insert a new task
        $query = "INSERT INTO tasks (title, description, completed_by) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $title, $description, $completedBy);
        $stmt->execute();

        // Check if the task was successfully created
        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function updateTask($taskId, $title, $description)
    {
        // Prepare and execute the SQL query to update the task
        $query = "UPDATE tasks SET title = ?, description = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $title, $description, $taskId);
        $stmt->execute();

        // Check if the task was successfully updated
        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteTask($taskId)
    {
        // Prepare and execute the SQL query to delete the task
        $query = "DELETE FROM tasks WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $taskId);
        $stmt->execute();

        // Check if the task was successfully deleted
        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getTasksByUserId($userId)
    {
        // Prepare and execute the SQL query to fetch tasks for a specific user
        $query = "SELECT * FROM tasks WHERE completed_by = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch and return the tasks as an array
        $tasks = array();
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        return $tasks;
    }

    public function getTaskById($taskId)
    {
        // Prepare and execute the SQL query to fetch a task by ID
        $query = "SELECT * FROM tasks WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $taskId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch and return the task as an array
        $task = $result->fetch_assoc();
        return $task;
    }
}
