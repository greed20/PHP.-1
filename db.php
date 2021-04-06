<?php
$link = mysqli_connect("localhost:3306", "root", "root", "db_test");
if(!$link){
    die(mysqli_connect_error($link));
}
session_start();
//Начинать сессию лучше тут так как базу данных мы тоже начинаем на каждой странице
?>