<?php
include("db.php");
unset($_SESSION['login']);
unset($_SESSION['role']);
header("Location: login.php");
?>