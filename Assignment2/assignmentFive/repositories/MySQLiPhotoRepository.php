<?php
require_once 'models/Database.php';
require_once 'models/Photo.php';
require_once 'repositories/PhotoRepositoryInterface.php';

class MySQLiPhotoRepository implements PhotoRepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPhotos()
    {
        $mysqli = $this->db->getConnection();
        // Implementing logic to fetch all photos from the database using MySQLi
        $query = "SELECT * FROM photos";
        $result = $mysqli->query($query);

        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = $row;
        }

        return $images;
    }

    public function getPhoto($id)
    {
        $mysqli = $this->db->getConnection();
        // Implementing logic to fetch a specific photo from the database using MySQLi
        $query = "SELECT * FROM photos WHERE id = $id";
        $result = $mysqli->query($query);

        return $result->fetch_assoc();
    }

    public function addPhoto($title, $description,$image)
    {
        $mysqli = $this->db->getConnection();
        // Implementing logic to add a new photo to the database using MySQLi
        $query = "INSERT INTO photos (title, description,image) VALUES ('$title', '$description','$image')";
        $result = $mysqli->query($query);

        return $result;
    }

    public function updatePhoto($id, $title, $description,$image)
    {
        $mysqli = $this->db->getConnection();
        // Implementing logic to update a specific photo in the database using MySQLi
        $sql = "UPDATE photos SET title='$title', description='$description', image='$image' WHERE id=$id";
        $result = $mysqli->query($sql);

        return $result;
    }

    public function deletePhoto($id)
    {
        $mysqli = $this->db->getConnection();
        // Implementing logic to delete a specific photo from the database using MySQLi
        $query = "DELETE FROM photos WHERE id = $id";
        $result = $mysqli->query($query);
        return $result;
    }
}
?>
