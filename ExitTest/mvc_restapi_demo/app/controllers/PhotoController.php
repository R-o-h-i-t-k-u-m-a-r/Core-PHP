<!-- This file will handle the logic and communication between the models and views. -->
<?php

class PhotoController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getAll() {
        $photos = $this->model->getAllPhotos();
        //setting which type of data is passing
header('Content-Type: application/json');
//setting who can acess this api
header('Acess-Control-Allow-Origin: *');
if(count($photos)>1){
    echo json_encode($photos);
}
else{
    echo json_encode(array('message'=>'NO Record Found.','status'=>false));
}

    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            $this->model->addPhoto($title, $description, $image);
            header('Location: index.php');
        } else {
            //include 'views/add_photo.php';
            include 'C:\xampp\htdocs\assignmentThree\app\views\add_photo.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            $this->model->updatePhoto($id, $title, $description, $image);
            header('Location: index.php');
        } else {
            $photo = $this->model->getPhotoById($id);
            //include 'views/edit_photo.php';
            //include 'C:\xampp\htdocs\mvc_practice\app\views\edit_photo.php';
            if (!$photo) {
                // Redirect or display an error message
                // ...
                echo "Erro while displaying image for edit";
            }
    
            // Render the edit photo view
            include 'C:\xampp\htdocs\assignmentThree\app\views\edit_photo.php';
        }
    }

    public function deletePreview($id)
    {
        $photo=$this->model->getPhotoById($id);
        include 'C:\xampp\htdocs\assignmentThree\app\views\delete_photo.php';
    }

    public function delete($id) {
        $this->model->deletePhoto($id);
        header('Location: index.php');
    }
    

}
