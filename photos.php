<?php include("layouts/header.html");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_FILES['photo']['name'];

    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    $types = ["jpeg", "png", "jpg"];
    $userid = md5(9);
    $new_name = time() . '.' . $extension;

    if (in_array($extension, $types)) {

        if (is_dir("uploads/$userid")) {
            move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$userid/$new_name");
        } else {
            mkdir("uploads/$userid", 0777);
            chmod("uploads/$userid",0777);
            move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$userid/$new_name");

        }

    }
}
?>
<div class="center">
    <h1>Upload your photos...</h1><br><br>
<form method="post" enctype="multipart/form-data" action="">
    <input type="file" name="photo" class="file">
    <input type="submit" name="upload" value="Upload" class="sbm">
</form>
</div>