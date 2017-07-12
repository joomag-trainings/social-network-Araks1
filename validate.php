<?php
function validate($param){
    $param = htmlspecialchars($param);
    $param = trim($param);
    $param = stripslashes($param);
    return $param;
}