<?php

namespace controller;

class ValidationController
{
    public $firstName = '';
    const DATABASE = 'database/database.txt';
    public $lastName = '';
    public $email = '';
    public $fill = '';
    public $success = '';
    public $errorMessage = '';

    /**
     * @param $info string
     */
    public function addToDatabase($info)
    {
        $handle = fopen(self::DATABASE, "a+");
        fwrite($handle, $info);
        fclose($handle);
    }

    /**
     * @param $email string
     * @param $password string
     */
    public function readFromDatabase($email, $password)
    {
        $handle = fopen(self::DATABASE, 'r');
        while (feof($handle) === false) {
            $row = fgets($handle);
            $all = explode("=>", $row);
            $dbEmail = $this->validate($all[0]);
            $dbPassword = $this->validate($all[1]);
            $hash = password_hash($password, PASSWORD_BCRYPT);
            if ($email == $dbEmail && password_verify($password, $hash)) {
                session_start();
                $_SESSION['email'] = $dbEmail;
                header('location:index.php?page=account&action=viewaccount');
            } else {
                $this->errorMessage = "Wrong username or password";
            }
        }

        fclose($handle);
    }

    /**
     * @param $param
     * @return string
     */
    public function validate($param)
    {
        $param = htmlspecialchars($param);
        $param = trim($param);
        $param = stripslashes($param);
        return $param;
    }

    public function actionCheckInputs()
    {
        if (isset($_POST['signup'])) {
            $this->firstName = $this->validate($_POST['f_name']);
            $this->lastName = $this->validate($_POST['l_name']);
            $this->email = $this->validate($_POST['email']);
            $password = $this->validate($_POST['password']);
            $confPassword = $this->validate($_POST['conf_password']);
            $sel = $this->validate($_POST['sel']);
            if ($this->firstName !== "" && $this->lastName !== "" && $this->email !== "" && $password !== "" && $confPassword !== "") {

                if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
                    $this->fill = "invalid email";
                }
                if ($password !== $confPassword) {
                    $this->fill = "Passwords don't match";
                } else {
                    $hash = password_hash($password, PASSWORD_BCRYPT);
                    $info = $this->email . '=>' . $hash . PHP_EOL;
                    $this->addToDatabase($info);
                    $this->success = "You are successfully registered!";
                }
            } else {
                $this->fill = "Please fill all the fields";
            }
        }
        if (isset($_POST['login'])) {

            $email = $this->validate($_POST['email']);
            $password = $this->validate($_POST['password']);
            if ($email == "" || $password == "") {
                $this->errorMessage = "Please fill all fields";
            } else {
                $this->readFromDatabase($email, $password);
            }
        }

        include('class/view/LoginView.php');
    }

    public function actionLogOut()
    {
        if (isset($_POST['logout'])) {
            session_start();
            session_destroy();
            header('location:index.php?page=validation&action=checkInputs');
        }
    }
}