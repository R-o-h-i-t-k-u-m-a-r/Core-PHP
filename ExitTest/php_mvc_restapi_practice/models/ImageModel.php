<?php

class ImageModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getImages() {
        $query = "SELECT * FROM photos";
        $result = $this->mysqli->query($query);

        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = $row;
        }

        return $images;
    }

    public function getImage($id) {
        $query = "SELECT * FROM photos WHERE id = $id";
        $result = $this->mysqli->query($query);

        return $result->fetch_assoc();
    }

    public function createImage($title, $description,$image) {
        $query = "INSERT INTO photos (title, description,image) VALUES ('$title', '$description','$image')";
        $result = $this->mysqli->query($query);

        return $result;
    }

    public function updateImage($id, $title, $description,$image) {
        // $query = "UPDATE photos SET title = '$title', description = '$description', image = '$image' WHERE id = $id";
        $sql = "UPDATE photos SET title='$title', description='$description', image='$image' WHERE id=$id";
        $result = $this->mysqli->query($sql);

        return $result;
    }

    public function deleteImage($id) {
        $query = "DELETE FROM photos WHERE id = $id";
        $result = $this->mysqli->query($query);
        //$result=$this->mysqli->executeQuery($query);

        return $result;
    }
}

?>
