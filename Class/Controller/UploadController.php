<?php

namespace Controller;

session_start();

class UploadController
{
    private $path = '';
    private $userId = '';
    private $uploadModel = '';
    static $error = '';

    static function makeModel()
    {
        $modelPath = 'Class/Model/UploadModel.php';
        include($modelPath);

    }

    public function actionChoosePhoto()
    {
        $id = $this->userId;
        self::makeModel();
        $this->uploadModel = new \UploadModel();
        $result = $this->uploadModel->select($_SESSION['id']);


        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_FILES['photo']['name'];
            $this->fileName = $name;
            $this->getFileName();

        }
        include "Class/view/PhotosView.php";
    }

    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($newName)
    {
        $this->path = "uploads/$this->userId/$newName";
    }

    /**
     * @return string
     */
    public function getUserId()
    {

        return $this->userId;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($id)
    {
        $this->userId = $id;

    }

    public function storePhotos($imageName)
    {
        $this->uploadModel->insert($_SESSION['id'], $imageName);

    }

    public function getFileName()
    {
        $extension = pathinfo($this->fileName, PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $types = ["jpeg", "png", "jpg"];
        if (in_array($extension, $types)) {
            $this->setUserId($this->userId);
            $newName = time() . '.' . $extension;
            if (is_dir("uploads/$this->userId")) {
                $this->setPath($newName);
                $isMoved = move_uploaded_file($_FILES['photo']['tmp_name'], $this->path);
                if ($isMoved) {
                    $this->storePhotos($newName);
                } else {
                    self::$error = "something went wrong";
                }

            } else {
                mkdir("uploads/$this->userId", 0777);
                chmod("uploads/$this->userId", 0777);
                $isMoved = move_uploaded_file($_FILES['photo']['tmp_name'], $this->path);
                if ($isMoved) {
                    $this->storePhotos($newName);
                } else {
                    self::$error = "something went wrong";
                }

            }
        } else {
            self::$error = 'Invalid file type';
        }
    }
}