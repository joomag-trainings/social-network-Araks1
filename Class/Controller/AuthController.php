<?php

namespace Controller;

class AuthController
{
    private $firstName = '';
    private $lastName = '';
    private $email = '';
    private $password = '';
    private $confPassword = '';
    private $gender = '';
    public $fill = '';

    /**
     * @param $param
     * @return string
     */
    static function sanitize($param)
    {
        $param = htmlspecialchars($param);
        $param = trim($param);
        $param = stripslashes($param);
        return $param;
    }

    public function actionSignIn()
    {

        if (isset($_POST['signup'])) {
            $this->firstName = self::sanitize($_POST['f_name']);
            $this->lastName = self::sanitize($_POST['l_name']);
            $this->email = self::sanitize($_POST['email']);
            $this->password = self::sanitize($_POST['password']);
            $this->confPassword = self::sanitize($_POST['conf_password']);
            $this->gender = self::sanitize($_POST['sel']);
            if ($this->firstName !== "" && $this->lastName !== "" && $this->email !== "" && $this->password !== "" && $this->confPassword !== "") {

                if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
                    $this->fill = "invalid email";
                }
                if ($this->password !== $this->confPassword) {
                    $this->fill = "Password does not match the confirm password.";
                } else {

                    $hash = password_hash($this->password, PASSWORD_BCRYPT);
                    $modelPath = 'Class/' . str_replace("Controller", "Model", __CLASS__) . '.php';
                    $modelPath = str_replace('\\', '/', $modelPath);
                    include($modelPath);
                    $userModel = new \AuthModel();
                    $userModel->insertUser($this->firstName, $this->lastName, $this->email, $hash,
                        $this->gender);
                }
            } else {

                $this->fill = "Please fill all the fields";
            }
        }
        include('Class/view/LoginView.php');
    }

    public function actionLogIn()
    {
        if (isset($_POST['login'])) {
            $email = $this->sanitize($_POST['email']);
            $password = $this->sanitize($_POST['password']);
            if ($email == "" || $password == "") {
                $this->errorMessage = "Please fill all fields";
            } else {
                $modelPath = 'Class/' . str_replace("Controller", "Model", __CLASS__) . '.php';
                $modelPath = str_replace('\\', '/', $modelPath);
                include($modelPath);

                $userModel = new \AuthModel();
                $userModel->logIn($email, $password);

            }
        }
        include('Class/view/LoginView.php');
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