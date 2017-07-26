<?php include("layouts/header.html"); ?>
<div id="container">
    <ul>
        <?php
        for ($i = 0;
        $i < count($arr);
        $i++){ ?>
        <li><a href="index.php?page=account&action=get&id=<?= $arr[$i]; ?>"><?php echo $firstName[$i] . ' ';
                echo $lastName[$i];
                } ?></a></li>
        <?php

        for ($i=1;$i<=$this->allPages;$i++) { ?>
            <a href="index.php?page=account&action=SearchFriends&num=<?= $i; ?>" ><?= $i; ?></a>
        <?php };?>
    </ul>
</div>