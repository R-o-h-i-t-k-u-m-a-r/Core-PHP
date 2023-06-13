<?php
require_once 'config.php';
require_once 'MySQLiPhotoRepository.php';
require_once 'PhotoService.php';

$photoRepository = new MySQLiPhotoRepository($conn);
$photoService = new PhotoService($photoRepository);

// Handle the HTTP GET request for retrieving all photos
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['endpoint'] === 'photos') {
    $photos = $photoService->getAllPhotos();
    echo json_encode($photos);
    exit;
}

// Handle the HTTP GET request for retrieving a specific photo
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['endpoint'] === 'photo' && isset($_GET['id'])) {
    $photoId = $_GET['id'];
    $photoData = $photoService->getPhoto($photoId);

    if ($photoData) {
        echo json_encode($photoData);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Photo not found']);
    }

    exit;
}

// Handle the HTTP POST request for adding a new photo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true);

    $title = $requestData['title'];
    $description = $requestData['description'];
    $image = $requestData['image'];

    $newPhotoId = $photoService->addPhoto($title, $description,$image);

    if ($newPhotoId) {
        http_response_code(201);
        echo json_encode(['id' => $newPhotoId]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to add photo']);
    }

    exit;
}

// Handle the HTTP PUT request for updating a photo
if ($_SERVER['REQUEST_METHOD'] === 'PUT' && $_GET['endpoint'] === 'photos' && isset($_GET['id'])) {
    $photoId = $_GET['id'];
    $requestData = json_decode(file_get_contents('php://input'), true);

    $title = $requestData['title'];
    $description = $requestData['description'];
    $image = $requestData['image'];

    $updated = $photoService->updatePhoto($photoId, $title, $description,$image);

    if ($updated) {
        echo json_encode(['success' => true]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to update photo']);
    }

    exit;
}

// Handle the HTTP DELETE request for deleting a photo
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && $_GET['endpoint'] === 'photos' && isset($_GET['id'])) {
    $photoId = $_GET['id'];
    $deleted = $photoService->deletePhoto($photoId);

    if ($deleted) {
        echo json_encode(['success' => true]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to delete photo']);
    }

    exit;
}

// Handle invalid endpoints
http_response_code(404);
echo json_encode(['error' => 'Invalid endpoint']);
?>
