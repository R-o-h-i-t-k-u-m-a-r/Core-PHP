<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <!-- Add your CSS stylesheets and JavaScript files here -->
</head>
<body>
    <h1>Edit Task</h1>

    <form action="edit_task.php" method="post">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $task['title']; ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $task['description']; ?></textarea>
        <br>
        <input type="submit" value="Update Task">
    </form>
</body>
</html>
