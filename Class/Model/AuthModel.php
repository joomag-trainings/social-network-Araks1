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
            $_SESSION['email'] = $row['email'];
            header('location:index.php?page=account&action=viewaccount');
        }
    }
}