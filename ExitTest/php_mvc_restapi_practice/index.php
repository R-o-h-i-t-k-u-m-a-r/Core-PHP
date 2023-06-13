<?php

// Load the necessary files
require_once 'config.php';
require_once 'models/ImageModel.php';
require_once 'controllers/ImageController.php';
require_once 'views/ImageView.php';

// Create instances of the model, controller, and view
$model = new ImageModel($mysqli);
$controller = new ImageController($model);
$view = new ImageView();

// Handle the API requests
$method = $_SERVER['REQUEST_METHOD'];
$controller->handleRequest($method, $_GET, $_POST, file_get_contents('php://input'));

// Render the response
$response = $controller->getResponse();
$view->render($response);

?>
