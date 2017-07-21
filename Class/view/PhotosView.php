<?php include("layouts/header.html"); ?>

<div class="center">
    <h1>Upload your photos...</h1><br><br>
    <form method="post" enctype="multipart/form-data" action="index.php?page=upload&action=upload">
        <input type="file" name="photo" class="file">
        <input type="submit" name="upload" value="Upload" class="sbm">
    </form>
</div>