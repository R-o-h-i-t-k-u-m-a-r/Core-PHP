<!-- This file will be the entry point for the application and will handle routing to the appropriate controller actions. -->
<?php
require_once 'C:\xampp\htdocs\assignmentThree\config\database.php';

require_once 'C:\xampp\htdocs\assignmentThree\core\Database.php';

require_once 'C:\xampp\htdocs\assignmentThree\app\models\PhotoModel.php';

require_once 'C:\xampp\htdocs\assignmentThree\app\controllers\PhotoController.php';

$db = new Database($hostname, $username, $password, $dbname);
$model = new PhotoModel($db);
$controller = new PhotoController($model);

$action = $_GET['action'] ?? 'index';

if ($action === 'add') {
    $controller->add();
} elseif ($action === 'edit') {
    $id = $_GET['id'] ?? die('Invalid request');
    $controller->edit($id);
} elseif ($action ==='delete') {
    $id = $_GET['id'] ?? die('Invalid request');
    $controller->delete($id);
} 
else if($action === 'preview'){
    $id=$_GET['id'] ?? die('Invalid request');
    $controller->deletePreview($id);
} else {
    $controller->index();
}



$db->closeConnection();
