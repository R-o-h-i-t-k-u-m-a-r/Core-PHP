<?php
require_once 'IPhotoRepository.php';

class PhotoService
{
    private $photoRepository;

    public function __construct(IPhotoRepository $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    public function getAllPhotos()
    {
        return $this->photoRepository->getAllPhotos();
    }

    public function getPhoto($id)
    {
        return $this->photoRepository->getPhoto($id);
    }

    public function addPhoto($title, $description,$image)
    {
        return $this->photoRepository->addPhoto($title, $description,$image);
    }

    public function updatePhoto($id, $title, $description,$image)
    {
        return $this->photoRepository->updatePhoto($id, $title, $description,$image);
    }

    public function deletePhoto($id)
    {
        return $this->photoRepository->deletePhoto($id);
    }
}
?>
