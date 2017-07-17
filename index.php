<?php
include('validationClass.php');
include('loginClass.php');
$object = new Validation();
$object->valid();
$obj = new login();
$obj->set();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <p id="success"><?= $object->success; ?></p>
    <div class="log_div">
        <h1>Join us-it's free!</h1>
        <button onclick="login()">Log in &#9660;</button>
    </div>
</header>

<div id="login_hidden" class="log_div">
    <p id="login_errors"><?= $obj->err; ?></p>
    <form method="post" action="" id="login">
        <input type="text" placeholder="Email" id="email" name="email">
        <input type="password" placeholder="Password" id="password" name="password">
        <button type="submit" class="login" name="login">Log in</button>
    </form>
</div>
<div class="center">

    <div class="reg_left">

        <img src="images/joinus.png" class="join_img">
    </div>
    <div class="reg_right">
        <p id="errors"><?= $object->fill; ?></p>
        <form method="post" action="" name="myform">
            <input type="text" placeholder="Name" name="f_name" value="<?= $object->f_name; ?>">
            <input type="text" placeholder="LastName" name="l_name" value="<?= $object->l_name; ?>">
            <input type="text" placeholder="Email" name="email" value="<?= $object->email; ?>"><br>
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Confirm Password" name="conf_password">
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