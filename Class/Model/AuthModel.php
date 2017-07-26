<?php

include('DatabaseModel.php');

class AuthModel extends DatabaseModel
{
    private $allUsersCount = '';
    private $currentPage = '';
    private $pageNumbers = '';
    private $offset = '';
    private $usersPerPage = '';

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
            header("location:index.php?page=account&action=viewaccount&id=" . $_SESSION['id']
            );
        }
    }

    public function search()
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        //$statement = $connection->prepare("SELECT * FROM users WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%' ");
        $statement = $connection->prepare("SELECT * FROM users");
        $statement->execute();
        $row = $statement->fetchAll();
        $this->allUsersCount = count($row);

        $this->pageNumbers = ($this->allUsersCount) / 3;

        if (is_float($this->pageNumbers)) {
            $this->pageNumbers = round($this->pageNumbers);
        }
        $this->currentPage = $_GET['num'];
        $this->offset = ($this->currentPage - 1) * 3;
        return $this->pageNumbers;
    }

    public function pagination()
    {
        $this->search();
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $statement = $connection->prepare("SELECT * FROM users LIMIT 3 OFFSET $this->offset");
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
        return $statement;
    }

    public function update($id)
    {
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $statement = $connection->prepare("UPDATE friends SET allow=1 WHERE user_id_2=:id");
        $statement->execute(array(':user_id_2' => $id));
    }
    public function selectAllFriends($frinedsId){
        $connection = new PDO($this->dsn, $this->username, $this->password);
        $statement = $connection->prepare("SELECT * FROM users where id=$frinedsId");
        $statement->execute();
        return $statement;
    }
}