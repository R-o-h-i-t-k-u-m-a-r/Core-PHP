<!DOCTYPE html>
<html>

<head>
    <title>Task List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Task List</h1>
        <a href="/task/create.php" class="btn btn-primary">Create Task</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) : ?>
                    <tr>
                        <td><?= $task['title']; ?></td>
                        <td><?= $task['description']; ?></td>
                        <td>
                            <a href="/task/edit.php?task_id=<?= $task['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="/task/delete.php?task_id=<?= $task['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/logout.php" class="btn btn-primary">Logout</a>
    </div>
</body>

</html>
