<!DOCTYPE html>
<html>
<head>
    <title>Task Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <span class="navbar-brand mb-0 h1">
    <?php
    echo "Welcome ", ucfirst($_SESSION['user_name']);
    ?>
  </span>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?action=logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
        <h1>Task Management App</h1>
        <a href="index.php?action=createTask" class="btn btn-primary">Create Task</a>
        <?php if (count($tasks) > 0): ?>
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Completed By</th>
                <th>Completed On</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($tasks as $task) : ?>
                <tr>
                    <td><?php echo $task['title']; ?></td>
                    <td><?php echo $task['description']; ?></td>
                    <td><?php echo $task['completed_by']; ?></td>
                    <td><?php echo $task['completed_on']; ?></td>
                    <td><?php echo $task['status']; ?></td>
                    <td>
                        <a href="index.php?action=editTask&id=<?php echo $task['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="index.php?action=deleteTask&id=<?php echo $task['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
          <p>No tasks found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
