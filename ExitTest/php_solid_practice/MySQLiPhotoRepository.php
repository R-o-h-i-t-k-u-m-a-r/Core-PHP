<?php
require_once 'IPhotoRepository.php';

class MySQLiPhotoRepository implements IPhotoRepository
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getAllPhotos()
    {
        // Implement logic to fetch all photos from the database using MySQLi
        $query = "SELECT * FROM photos";
        $result = $this->mysqli->query($query);

        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = $row;
        }

        return $images;
    }

    public function getPhoto($id)
    {
        // Implement logic to fetch a specific photo by ID from the database using MySQLi
        $query = "SELECT * FROM photos WHERE id = $id";
        $result = $this->mysqli->query($query);

        return $result->fetch_assoc();
    }

    public function addPhoto($title, $description,$image)
    {
        // Implement logic to add a new photo to the database using MySQLi
        $query = "INSERT INTO photos (title, description,image) VALUES ('$title', '$description','$image')";
        $result = $this->mysqli->query($query);

        return $result;
    }

    public function updatePhoto($id, $title, $description,$image)
    {
        // Implement logic to update a photo in the database using MySQLi
        $sql = "UPDATE photos SET title='$title', description='$description', image='$image' WHERE id=$id";
        $result = $this->mysqli->query($sql);

        return $result;
    }

    public function deletePhoto($id)
    {
        // Implement logic to delete a photo from the database using MySQLi
        $query = "DELETE FROM photos WHERE id = $id";
        $result = $this->mysqli->query($query);
        return $result;
    }
}
?>
