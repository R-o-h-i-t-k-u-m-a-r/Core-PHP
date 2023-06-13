<?php

class TaskModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllTasks() {
        $sql = "SELECT * FROM tasks";
        $result = $this->conn->query($sql);

        $tasks = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
        }

        return $tasks;
    }

    public function getTaskById($id) {
        $sql = "SELECT * FROM tasks WHERE id = $id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }

    public function addTask($title, $description) {
        $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
        $this->conn->query($sql);
    }

    public function updateTask($id, $title, $description) {
        $sql = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";
        $this->conn->query($sql);
    }

    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id = $id";
        $this->conn->query($sql);
    }
}
