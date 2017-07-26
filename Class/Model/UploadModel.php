<?php

include('DatabaseModel.php');

class UploadModel extends DatabaseModel
{
    public function insert($userId, $imageName)
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $statement = $connection->prepare('INSERT INTO photos (user_id, image_name,general) VALUES (:userId, :imageName,0)');
        $statement->bindParam(':userId', $userId);
        $statement->bindParam(':imageName', $imageName);
        $statement->execute();
    }

    public function select($userId)
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $select = $connection->prepare("SELECT * FROM photos WHERE user_id=:userId");
        $select->bindParam(':userId', $userId);
        $select->execute();
        $arr = array();
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            array_push($arr, $row['image_name']);
        }
        return $arr;
    }
}