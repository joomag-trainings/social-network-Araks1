<?php

class login extends Validation
{
    public $err = "";

    public function set()
    {

        if (isset($_POST['login'])) {
            $email = $this->validate($_POST['email']);
            $password = $this->validate($_POST['password']);
            $hash = password_hash($password, PASSWORD_BCRYPT);
            if ($email == "" || $password == "") {
                $this->err = "Please fill all fields";
            } else {
                $handle = fopen('database.txt', 'r');
                while (feof($handle) === false) {
                    $row = fgets($handle);
                    $all = explode("=>", $row);
                    $db_email = $this->validate($all[0]);
                    $db_password = $this->validate($all[1]);

                    if ($email == $db_email && password_verify($db_password, $hash)) {
                        session_start();
                        $_SESSION['email'] = $db_email;
                        header('location:account.php');
                    } else {
                        $this->err = "Wrong username or password";


                    }
                }

                fclose($handle);

            }

        }
    }
}