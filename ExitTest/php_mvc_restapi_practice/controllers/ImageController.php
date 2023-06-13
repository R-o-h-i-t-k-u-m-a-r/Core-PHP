<?php

class ImageController {
    private $model;
    private $response;

    public function __construct($model) {
        $this->model = $model;
    }

    public function handleRequest($method, $getParams, $postParams, $inputData) {
        switch ($method) {
            case 'GET':
                if (isset($getParams['id'])) {
                    $id = $getParams['id'];
                    $this->response = $this->model->getImage($id);
                } else {
                    $this->response = $this->model->getImages();
                }
                break;
            case 'POST':
                $data = json_decode($inputData, true);
                $title = $data['title'];
                $description = $data['description'];
                $image = $data['image'];
                $this->response = $this->model->createImage($title, $description,$image);
                break;
            case 'PUT':
                $id = $getParams['id'];
                $data = json_decode($inputData, true);

                //$id = $data['id'];
                $title = $data['title'];
                $description = $data['description'];
                $image = $data['image'];
                $this->response = $this->model->updateImage($id, $title, $description,$image);
                break;
            case 'DELETE':
                $id = $getParams['id'];
                $this->response = $this->model->deleteImage($id);
                break;
            default:
                $this->response = false;
                break;
        }
    }

    public function getResponse() {
        return $this->response;
    }
}

?>
