<?php

namespace Controller;

class UploadController
{
    public static $error = '';

    static function actionUpload()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_FILES['photo']['name'];
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $types = ["jpeg", "png", "jpg"];
            $userId = md5(9);
            if (in_array($extension, $types)) {
                $newName = time() . '.' . $extension;
                if (is_dir("uploads/$userId")) {
                    $isMoved = move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$userId/$newName");
                } else {
                    mkdir("uploads/$userId", 0777);
                    chmod("uploads/$userId", 0777);
                    $isMoved = move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$userId/$newName");
                }
            } else {
                self::$error = 'Invalid file type';
            }
        }
        include "Class/view/PhotosView.php";
    }
    public function save(){

    }

}