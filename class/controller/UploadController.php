<?php

namespace controller;

class UploadController
{
    public static $error = '';

    static function actionGetExtension()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_FILES['photo']['name'];

            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $types = ["jpeg", "png", "jpg"];
            $userId = md5(9);


            if (in_array($extension, $types)) {
                self::actionMoveFile($extension, $userId);
            } else {
                self::$error = 'Invalid file type';
            }
        }
        include "class/view/PhotosView.php";
    }

    public function actionMoveFile($extension, $userId)
    {
        $new_name = time() . '.' . $extension;
        if (is_dir("uploads/$userId")) {
            move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$userId/$new_name");
        } else {
            mkdir("uploads/$userId", 0777);
            chmod("uploads/$userId", 0777);
            move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$userId/$new_name");

        }
    }
}