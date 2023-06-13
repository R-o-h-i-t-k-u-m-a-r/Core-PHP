<!-- This file will handle the deletion of a photo. -->
<!-- Bootstrap CSS and styles.css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Confirmation message for deleting a photo -->
<div class="container">
    <h2>Delete Photo</h2>
    <p>Are you sure you want to delete this photo?</p>
    <a href="index.php" class="btn btn-primary">Cancel</a>
    <?php
    $id=$_GET['id'];
    ?>
    <a href="index.php?action=delete&id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
    <!-- <a href="delete_task.php?id=<?php echo $photo['id']; ?>">Delete</a> -->
</div>

<!-- Bootstrap JS and script.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
