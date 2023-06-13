<!-- This view displays the list of photos in the gallery. -->
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
    <h2>Photo Gallery</h2>
    <a href="add_photo.php" class="btn btn-primary">Add Photo</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($photos as $photo): ?>
            <tr>
                <td><?php echo $photo['title']; ?></td>
                <td><?php echo $photo['description']; ?></td>
                <td>
                    <img src="<?php echo $photo['image']; ?>" alt="<?php echo $photo['title']; ?>" width="100">
                </td>
                <td>
                    <!-- <a href="edit_photo.php?id=<?php echo $photo['id']; ?>" class="btn btn-primary">Edit</a> -->
                    <a href="index.php?action=edit&id=<?php echo $photo['id']; ?>" class="btn btn-primary">Edit</a>


                    <!-- <a href="delete_photo.php?id=<?php echo $photo['id']; ?>" class="btn btn-danger">Delete</a> -->

                    <a href="index.php?action=preview&id=<?php echo $photo['id']; ?>" class="btn btn-danger">Delete</a>

                    <!-- <a href="deleteTask.php?id=<?php echo $photo['id']; ?>" class="btn btn-danger">Delete</a> -->


                    <!-- <a href="index.php?action=delete&id=<?php echo $photo['id']; ?>" class="btn btn-danger">Delete</a> -->
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
