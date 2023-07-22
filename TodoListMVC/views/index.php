<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            flex: 1;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            transition: background-color 0.2s ease;
        }

        li:last-child {
            border-bottom: none;
        }

        .task-name {
            flex: 1;
        }

        .status-todo {
            color: #FF0000;
        }

        .status-in_progress {
            color: #FFA500;
        }

        .status-done {
            color: #008000;
            text-decoration: line-through;
        }

        .delete-btn,
        .update-btn {
            margin-left: 10px;
            margin-right: 10px;
            background-color: transparent;
            border: none;
            color: #333;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .delete-btn:hover,
        .update-btn:hover {
            color: #FF0000;
            border-radius: 5px 5px 5px 5px;
        }

        .done-task {
            text-decoration: line-through;
            color: #777;
            opacity: 1;
            transition: opacity 1s linear;
        }

        .remove {
            opacity: 0;
            transition: opacity 1s linear;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <form method="post" action="index.php?action=add">
            <input type="text" id="task" name="task" required>
            <button type="submit">Ajouter</button>
        </form>
        <h2>Tâches à faire :</h2>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <span class="task-name <?php echo 'status-' . $task['status']; ?>">
                        <?php echo $task['task_name']; ?>
                    </span>
                    <span class="status"><?php echo ucfirst($task['status']); ?></span>
                    <button class="delete-btn" onclick="window.location.href='index.php?action=delete&id=<?php echo $task['id']; ?>'">Supprimer</button>
                    <?php if ($task['status'] !== 'done'): ?>
                        <button class="update-btn" onclick="window.location.href='index.php?action=update&id=<?php echo $task['id']; ?>&status=<?php echo $task['status']; ?>'">Mettre à jour le statut</button>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
