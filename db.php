<?php

$link = mysqli_connect("localhost:3306", "root", "root", "db_test");
if(!$link){
    die(mysqli_connect_error($link));
}
?>