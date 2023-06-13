<?php
require_once 'services/PhotoService.php';

class PhotoController
{
    private $photoService;

    public function __construct()
    {
        $this->photoService = new PhotoService();
    }

    public function handleRequest()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $endpoint = $_GET['endpoint'];

        switch ($requestMethod) {
            case 'GET':
                if ($endpoint === 'photos') {
                    $this->getAllPhotos();
                } elseif ($endpoint === 'photo' && isset($_GET['id'])) {
                    $photoId = $_GET['id'];
                    $this->getPhoto($photoId);
                } else {
                    $this->notFoundResponse();
                }
                break;
            case 'POST':
                if ($endpoint === 'photos') {
                    $this->addPhoto();
                } else {
                    $this->notFoundResponse();
                }
                break;
            case 'PUT':
                if ($endpoint === 'photos' && isset($_GET['id'])) {
                    $photoId = $_GET['id'];
                    $this->updatePhoto($photoId);
                } else {
                    $this->notFoundResponse();
                }
                break;
            case 'DELETE':
                if ($endpoint === 'photos' && isset($_GET['id'])) {
                    $photoId = $_GET['id'];
                    $this->deletePhoto($photoId);
                } else {
                    $this->notFoundResponse();
                }
                break;
            default:
                $this->notFoundResponse();
                break;
        }
    }

    private function getAllPhotos()
    {
        $photos = $this->photoService->getAllPhotos();
        $this->jsonResponse($photos);
    }

    private function getPhoto($photoId)
    {
        $photo = $this->photoService->getPhoto($photoId);
        if ($photo) {
            $this->jsonResponse($photo);
        } else {
            $this->notFoundResponse();
        }
    }

    private function addPhoto()
    {
        $requestData = json_decode(file_get_contents('php://input'), true);
        $title = $requestData['title'];
        $description = $requestData['description'];
        $image = $requestData['image'];

        $newPhotoId = $this->photoService->addPhoto($title, $description,$image);
        if ($newPhotoId) {
            $this->createdResponse(['id' => $newPhotoId]);
        } else {
            $this->errorResponse('Failed to add photo', 500);
        }
    }

    private function updatePhoto($photoId)
    {
        $requestData = json_decode(file_get_contents('php://input'), true);
        $title = $requestData['title'];
        $description = $requestData['description'];
        $image = $requestData['image'];

        $updated = $this->photoService->updatePhoto($photoId, $title, $description,$image);
        if ($updated) {
            $this->jsonResponse(['success' => true]);
        } else {
            $this->errorResponse('Failed to update photo', 500);
        }
    }

    private function deletePhoto($photoId)
    {
        $deleted = $this->photoService->deletePhoto($photoId);
        if ($deleted) {
            $this->jsonResponse(['success' => true]);
        } else {
            $this->errorResponse('Failed to delete photo', 500);
        }
    }

    private function jsonResponse($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    private function createdResponse($data)
    {
        http_response_code(201);
        $this->jsonResponse($data);
    }

    private function errorResponse($message, $statusCode)
    {
        http_response_code($statusCode);
        $this->jsonResponse(['error' => $message]);
    }

    private function notFoundResponse()
    {
        http_response_code(404);
        $this->jsonResponse(['error' => 'Invalid endpoint']);
    }
}
?>
