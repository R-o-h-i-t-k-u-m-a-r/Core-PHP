<!DOCTYPE html>
<html>
<head>
    <title>Task Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Task Management App</h1>
        <a href="index.php?action=create" class="btn btn-primary">Create Task</a>
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Task</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($tasks as $task) : ?>
                <tr>
                    <td><?php echo $task['title']; ?></td>
                    <td><?php echo $task['task']; ?></td>
                    <td><?php echo $task['task_status']; ?></td>
                    <td><?php echo $task['created_at']; ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?php echo $task['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="index.php?action=delete&id=<?php echo $task['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
