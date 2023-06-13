<!-- This file will handle the logic and communication between the models and views. -->
<?php
require_once 'services/PhotoService.php';

class PhotoController {
    private $photoService;

    public function __construct()
    {
        $this->photoService = new PhotoService();
    }

    public function index() {
        $photos = $this->photoService->getAllPhotos();
        include 'views/photo_gallery.php';
        //include 'C:\xampp\htdocs\assignmentThree\app\views\photo_list.php';
        //include 'C:\xampp\htdocs\assignmentThree\app\views\photo_gallery.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            $this->photoService->addPhoto($title, $description, $image);
            header('Location: index.php');
        } else {
            include 'views/add_photo.php';
            //include 'C:\xampp\htdocs\assignmentThree\app\views\add_photo.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            $this->photoService->updatePhoto($id, $title, $description, $image);
            header('Location: index.php');
        } else {
            $photo = $this->photoService->getPhotoById($id);
            //include 'views/edit_photo.php';
            //include 'C:\xampp\htdocs\mvc_practice\app\views\edit_photo.php';
            if (!$photo) {
                // Redirect or display an error message
                // ...
                echo "Erro while displaying image for edit";
            }
    
            // Render the edit photo view
            //include 'C:\xampp\htdocs\assignmentThree\app\views\edit_photo.php';
            include 'views/edit_photo.php';
        }
    }

    public function deletePreview($id)
    {
        $photo=$this->photoService->getPhotoById($id);
        //include 'C:\xampp\htdocs\assignmentThree\app\views\delete_photo.php';
        include 'views/delete_photo.php';
    }

    public function delete($id) {
        $this->photoService->deletePhoto($id);
        header('Location: index.php');
    }
    

}
