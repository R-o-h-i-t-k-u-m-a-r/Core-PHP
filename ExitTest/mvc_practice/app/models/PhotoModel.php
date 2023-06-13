<!-- This file will handle database operations related to the photo gallery. -->
<?php
class PhotoModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllPhotos() {
        $sql = "SELECT * FROM photos";
        $result = $this->db->executeQuery($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addPhoto($title, $description, $image) {
        $sql = "INSERT INTO photos (title, description, image) VALUES ('$title', '$description', '$image')";
        return $this->db->executeQuery($sql);
    }

    public function getPhotoById($id) {
        $sql = "SELECT * FROM photos WHERE id = $id";
        $result = $this->db->executeQuery($sql);
        return $result->fetch_assoc();
    }

    public function updatePhoto($id, $title, $description, $image) {
        $sql = "UPDATE photos SET title='$title', description='$description', image='$image' WHERE id=$id";
        return $this->db->executeQuery($sql);
    }

    public function deletePhoto($id) {
        $sql = "DELETE FROM photos WHERE id = $id";
        return $this->db->executeQuery($sql);
    }

    

}
