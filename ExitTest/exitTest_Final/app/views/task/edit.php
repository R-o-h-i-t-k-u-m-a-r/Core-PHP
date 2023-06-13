<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form method="POST" action="index.php?action=updateTask">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="<?php echo $task['title']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control"><?php echo $task['description']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="completedOn">Completed On</label>
                <input type="date" class="form-control" id="completedOn" name="completedOn" value="<?php echo $task['completed_on']; ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="pending" <?php if ($task['status'] === 'pending') echo 'selected'; ?>>Pending</option>
                    <option value="completed" <?php if ($task['status'] === 'completed') echo 'selected'; ?>>Completed</option>
                    <option value="re-open" <?php if ($task['status'] === 're-open') echo 'selected'; ?>>Re-open</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
