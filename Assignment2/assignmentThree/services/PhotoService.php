<?php
require_once 'repositories/PhotoRepositoryInterface.php';
require_once 'repositories/MySQLiPhotoRepository.php';

class PhotoService
{
    private $photoRepository;

    public function __construct()
    {
        $this->photoRepository = new MySQLiPhotoRepository();
    }

    public function getAllPhotos()
    {
        return $this->photoRepository->getAllPhotos();
    }

    public function getPhotoById($id)
    {
        return $this->photoRepository->getPhotoById($id);
    }

    public function addPhoto($title, $description, $image)
    {
        return $this->photoRepository->addPhoto($title, $description,$image);
    }

    public function updatePhoto($id, $title, $description, $image)
    {
        return $this->photoRepository->updatePhoto($id, $title, $description,$image);
    }

    public function deletePhoto($id)
    {
        return $this->photoRepository->deletePhoto($id);
    }
}
?>
