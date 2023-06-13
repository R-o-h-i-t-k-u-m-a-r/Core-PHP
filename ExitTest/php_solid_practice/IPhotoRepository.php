<?php
interface IPhotoRepository
{
    public function getAllPhotos();
    public function getPhoto($id);
    public function addPhoto($title, $description,$image);
    public function updatePhoto($id, $title, $description,$image);
    public function deletePhoto($id);
}
?>
