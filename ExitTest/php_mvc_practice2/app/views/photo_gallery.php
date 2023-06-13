<!-- This view displays the list of photos in the gallery. -->
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body{
        background-color: #fff;
    }
    .card-img-top{
        width: 100%;
    height: 15vw;
    object-fit: cover;
    }
</style>

<div class="container">
    <h2>Photo Gallery</h2>
    <a href="index.php?action=add" class="btn btn-primary">Add Photo</a>
  <div class="row mt-5 mg-2">
<?php foreach ($photos as $photo): ?>
    <div class="col-4">
    <div class="card mb-5" style="width: 18rem;">
  <img src="<?php echo $photo['image']; ?>" class="card-img-top" alt="<?php echo $photo['title']; ?>" >
  <a href="index.php?action=edit&id=<?php echo $photo['id']; ?>" class="btn btn-primary">Edit</a>
    <a href="index.php?action=preview&id=<?php echo $photo['id']; ?>" class="btn btn-danger">Delete</a>
</div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
