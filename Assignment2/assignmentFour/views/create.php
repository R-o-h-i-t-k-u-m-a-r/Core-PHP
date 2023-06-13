<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Create Task</h1>
        <form method="POST" action="index.php?action=store">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="task">Task:</label>
                <textarea name="task" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="task_status">Status:</label>
                <select name="task_status" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
