<?php

include('DatabaseModel.php');

class AuthModel extends DatabaseModel
{
    public function insertUser($firstName, $lastName, $email, $pwd, $gender)
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $statement = $connection->prepare('INSERT INTO users ( first_name, last_name, email, password, gender) VALUES (:firstName, :lastName, :email, :password, :gender)');
        $statement->bindParam(':firstName', $firstName);
        $statement->bindParam(':lastName', $lastName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $pwd);
        $statement->bindParam(':gender', $gender);
        $statement->execute();
        $statement->closeCursor();
    }

    public function logIn($email, $pwd)
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $statement = $connection->prepare("SELECT * FROM users WHERE email = :email");
        $statement->execute(array(':email' => $email));
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $verify = $row['password'];
        if (password_verify($pwd, $verify)) {
            session_start();
            $_SESSION['id'] = $row['id'];
            header('location:index.php?page=account&action=viewaccount');
        }
    }

    public function search($name)
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $statement = $connection->prepare("SELECT * FROM users WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%' ");
        $statement->execute();
        return $statement;
    }

    public function notify($id, $who)
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $insert = $connection->prepare("INSERT INTO friends (user_id_1,user_id_2,allow) VALUES (:user_id_1,:user_id_2,0)");
        $inserted = $insert->execute(array(':user_id_1' => $who, ':user_id_2' => $id));
        return $inserted;
    }

    public function allow($id)
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $statement = $connection->prepare("SELECT * FROM friends where user_id_2=$id AND allow=0");
        $statement->execute();
        $row = $statement->fetchAll();
        $count = count($row);
        return $count;
    }

    public function update($id)
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $statement = $connection->prepare("UPDATE friends SET allow=1 WHERE user_id_2=:id");
        $statement->execute(array(':user_id_2' => $id));
    }
}