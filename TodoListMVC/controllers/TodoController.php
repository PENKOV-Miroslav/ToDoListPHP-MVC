<?php
require_once 'models/Task.php';

class TodoController {
    private $model;

    public function __construct($db) {
        $this->model = new Task($db);
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'add') {
            $taskName = $_POST['task'];
            $this->model->addTask($taskName);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['action']) && $_GET['action'] === 'update') {
                $taskId = $_GET['id'];
                $status = $_GET['status'];
                if ($status === 'todo') {
                    $status = 'in_progress';
                } elseif ($status === 'in_progress') {
                    $status = 'done';
                } else {
                    $status = 'todo';
                }
                $this->model->updateTaskStatus($taskId, $status);
            } elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
                $taskId = $_GET['id'];
                $this->model->deleteTask($taskId);
            }
        }

        $tasks = $this->model->getAllTasks();
        include 'views/index.php';
    }
}
?>
