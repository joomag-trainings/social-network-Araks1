<?php include("layouts/header.html"); ?>
<div id="container">
    <div class="left">
        <div class="account">
            <h2>Name Lastname </h2>
            <img src="images/6-512.png" width="180px" height="180px">

            <div class="info">
                <span><strong>Email:</strong></span>
                <span><strong>Gender:</strong>Male</span>
                <span><strong>Country:</strong></span>my country
            </div>
            <a href="edit.html" class="edit_a edit">Edit<i class="fa fa-pencil-square-o penc" aria-hidden="true"></i></a>
        </div>
        <div class="photo">
            <i class="fa fa-camera-retro" aria-hidden="true"></i>
            <a href="index.php?page=upload&action=upload">My photos</a>
        </div>
    </div>
    <?php if (isset($_GET['send'])) { ?>
        <button class="friend" id="friend" disabled>Sent &#10003;</button>
    <?php } else { ?>
        <button class="friend" id="friend">Add to Friend</button>
    <?php } ?>
</div>
<script> var get = "<?= $_GET['id']; ?>" </script>
<script src="js/init.js"></script>