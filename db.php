<?php

$link = mysqli_connect("localhost", "root", "", "db_test");
if(!$link){
    die(mysqli_connect_error($link));
}
?>