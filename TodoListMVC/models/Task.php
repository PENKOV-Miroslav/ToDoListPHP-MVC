<?php
class Task {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllTasks() {
        $query = "SELECT * FROM tasks";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($taskName) {
        $query = "INSERT INTO tasks (task_name) VALUES (:task_name)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':task_name', $taskName);
        return $stmt->execute();
    }

    public function updateTaskStatus($taskId, $status) {
        $query = "UPDATE tasks SET status = :status WHERE id = :task_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':task_id', $taskId);
        return $stmt->execute();
    }

    public function deleteTask($taskId) {
        $query = "DELETE FROM tasks WHERE id = :task_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':task_id', $taskId);
        return $stmt->execute();
    }
}
?>
