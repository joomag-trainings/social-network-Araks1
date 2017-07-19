<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <p id="success"><?= $this->success;   ?></p>
    <div class="log_div">
        <h1>Join us-it's free!</h1>
        <button onclick="login()">Log in &#9660;</button>
    </div>
</header>

<div id="login_hidden" class="log_div">
    <p id="login_errors"><?= $this->errorMessage; ?></p>
    <form method="post" action="" id="login">
        <input type="text" placeholder="Email" id="email" name="email">
        <input type="password" placeholder="Password" id="password" name="password">
        <button type="submit" class="login" name="login">Log in</button>
    </form>
</div>
<div class="center">
e
    <div class="reg_left">

        <img src="images/joinus.png" class="join_img">
    </div>
    <div class="reg_right">
        <p id="errors"><?= $this->fill; ?></p>
        <form method="post" action="" name="myform">
            <input type="text" placeholder="Name" name="f_name" value="<?= $this->firstName; ?>">
            <input type="text" placeholder="LastName" name="l_name" value="<?= $this->lastName; ?>">
            <input type="text" placeholder="Email" name="email" value="<?= $this->email; ?>"><br>
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