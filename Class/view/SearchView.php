<?php include("layouts/header.html"); ?>
<div id="container">
    <ul>
        <?php
        for ($i = 0;
        $i < count($arr);
        $i++){ ?>
        <li><a href="index.php?page=account&action=SearchFriends&id=<?= $arr[$i]; ?>"><?php echo $firstName[$i] . ' ';
                echo $lastName[$i];
                } ?></a></li>
    </ul>
</div>