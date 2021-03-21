<?php
$id = (int)$_GET['id'];
if(!empty($id)){
    include("db.php");
    $result = mysqli_query($link, "DELETE FROM `catalog` WHERE `id` = $id");
    if(!$result){
        die(mysqli_error($link));
    }
}
header("Location: admin.php");
?>