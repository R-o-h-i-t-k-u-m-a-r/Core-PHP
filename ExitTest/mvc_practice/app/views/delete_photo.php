<!-- This file will handle the deletion of a photo. -->
<!-- Bootstrap CSS and styles.css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Confirmation message for deleting a photo -->
<div class="container">
    <h2>Delete1 Photo</h2>
    <p>Are you sure you want to delete this photo?</p>
    <!-- <a href="index.php" class="btn btn-primary">Cancel</a> -->
    <!-- <a href="index.php?action=delete&id=<?php echo $id; ?>" class="btn btn-danger">Delete</a> -->
    <!-- <a href="delete_task.php?id=<?php echo $photo['id']; ?>">Delete</a> -->
    <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $photo['title']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required><?php echo $photo['description']; ?></textarea>
        </div>
        <div class="form-group">
            <img src="<?php echo $photo['image']; ?>" width="100">
        </div>
        <a href="index.php" class="btn btn-primary">Cancel</a>
        <a href="index.php?action=delete&id=<?php echo $photo['id']; ?>" class="btn btn-danger">Delete</a>
</div>

<!-- Bootstrap JS and script.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
