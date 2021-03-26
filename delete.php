<?php
include("db.php");
if(isset($_SESSION['login']) && $_SESSION['role'] == 'admin'){
$id = (int)$_GET['id'];
if(!empty($id)){
    $result = mysqli_query($link, "DELETE FROM `catalog` WHERE `id` = $id");
    if(!$result){
        die(mysqli_error($link));
    }
}
header("Location: admin.php");
}else{
    header("Location: index.php");
}
?>