<?php
interface PhotoRepositoryInterface
{
    public function getAllPhotos();
    public function addPhoto($title, $description, $image);
    public function getPhotoById($id);
    public function updatePhoto($id, $title, $description, $image);
    public function deletePhoto($id);
}
?>
