<!-- This file will be the entry point for the application and will handle routing to the appropriate controller actions. -->
<?php
require_once 'C:\xampp\htdocs\assignmentFive\config\database.php';

require_once 'C:\xampp\htdocs\assignmentFive\core\Database.php';

require_once 'C:\xampp\htdocs\assignmentFive\app\models\PhotoModel.php';

require_once 'C:\xampp\htdocs\assignmentFive\app\controllers\PhotoController.php';

$db = new Database($hostname, $username, $password, $dbname);
$model = new PhotoModel($db);
$controller = new PhotoController($model);

$request=$_SERVER['REQUEST_METHOD'];
//print($request);
switch ($request) {
    case 'GET':
        $controller->getAll();
        break;
    case 'POST':
        response(addData());
        break;
    case 'PUT':
        response(updateData());
        break;
    case 'DELETE':
        ///
        break;
    default:
        # code...
        break;
}



$db->closeConnection();
