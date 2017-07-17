<?php

class Validation
{
    public $f_name = '';
    public $l_name = '';
    public $email = '';
    public $fill = '';
    public $success = '';

    public function validate($param)
    {
        $param = htmlspecialchars($param);
        $param = trim($param);
        $param = stripslashes($param);
        return $param;
    }

    public function valid()
    {

        if (isset($_POST['signup'])) {
            $this->f_name = $this->validate($_POST['f_name']);
            $this->l_name = $this->validate($_POST['l_name']);
            $this->email = $this->validate($_POST['email']);
            $password = $this->validate($_POST['password']);
            $conf_password = $this->validate($_POST['conf_password']);
            $sel = $this->validate($_POST['sel']);
            if ($this->f_name !== "" && $this->l_name !== "" && $this->email !== "" && $password !== "" && $conf_password !== "") {

                if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
                    $this->fill = "invalid email";
                }
                if ($password !== $conf_password) {
                    $this->fill = "Passwords don't match";
                } else {
                    $this->success = "You are successfully registered!";
                }
            } else {

                $this->fill = "Please fill all the fields";
            }
        }
    }
}