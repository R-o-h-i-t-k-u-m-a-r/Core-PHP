<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <!-- Add your CSS stylesheets and JavaScript files here -->
</head>
<body>
    <h1>To-Do List</h1>

    <form action="add_task.php" method="post">
        <input type="text" name="title" placeholder="Task title">
        <textarea name="description" placeholder="Task description"></textarea>
        <button type="submit">Add Task</button>
    </form>

    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?php echo $task['title']; ?></td>
                <td><?php echo $task['description']; ?></td>
                <td>
                    <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
                    <a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
