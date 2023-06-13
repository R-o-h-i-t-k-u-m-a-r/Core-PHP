<!-- This file will contain the form for editing an existing photo. -->
<!-- Bootstrap CSS and styles.css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Form for editing a photo -->
<div class="container">
    <h2>Edit1 Photo</h2>
    <form method="POST" action="index.php?action=edit&id=<?php echo $photo['id']; ?>">
        <div class="form-group">
            <label for="title">Title1:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $photo['title']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required><?php echo $photo['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="text" class="form-control" id="image" name="image" value="<?php echo $photo['image']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<!-- Bootstrap JS and script.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
