<?php
$f_name = '';
$l_name = '';
$email = '';
$fill = '';
$success = '';
require('validate.php');
if ( isset($_POST['signup'])) {
    $f_name = validate($_POST['f_name']);
    $l_name = validate($_POST['l_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $conf_password = validate($_POST['conf_password']);
    $sel = validate($_POST['sel']);
    if ($f_name !== "" && $l_name !== "" && $email !== "" && $password !== "" && $conf_password !== "") {

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $fill = "invalid email";
        }
        if ($password !== $conf_password) {
            $fill = "Passwords don't match";
        } else {
            $success = "You are successfully registered!";
        }
    } else {

        $fill = "Please fill all the fields";
    }

}
/*if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email !== "" && $password !== ""){

    }
    else{

    }
}*/
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <p id="success"><?=  $success; ?></p>
            <div class="log_div">
            <h1>Join us-it's free!</h1>
                <button onclick="login()">Log in &#9660;</button>
            </div>
        </header>

        <div id="login_hidden" class="log_div">
            <p id="login_errors"></p>
            <form method="post" action="" id="login">
                <input type="text" placeholder="Email" id="email">
                <input type="password" placeholder="Password" id="password">
                <button type="submit" class="login" name="login">Log in</button>
            </form>
        </div>
        <div class="center">

            <div class="reg_left">

                <img src="images/joinus.png" class="join_img">
            </div>
            <div class="reg_right">
                <p id="errors"><?= $fill; ?></p>
                <form method="post" action="" name="myform" >
                    <input type="text" placeholder="Name" name="f_name" value="<?= $f_name; ?>">
                    <input type="text" placeholder="LastName" name="l_name" value="<?= $l_name; ?>">
                    <input type="text" placeholder="Email" name="email" value="<?= $email; ?>"><br>
                    <input type="password" placeholder="Password" name="password" >
                    <input type="password" placeholder="Confirm Password" name="conf_password" >
                    <select name="sel" required>
                        <option disabled="" selected="">Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <br>
                    <button type="submit" class="signup" name="signup">Sign up</button>
                </form>
            </div>
        </div>
        <script src="js/init.js"></script>
    </body>
</html>