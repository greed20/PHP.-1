<?php
    include("db.php");
    if($_SESSION['role'] != 'admin'){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
    $id = (int)$_GET['id'];
    $descrip = htmlspecialchars($_POST["descrip"]);
    $name = htmlspecialchars($_POST["name"]);
    $price = htmlspecialchars($_POST["price"]);
    $result = mysqli_query($link, "SELECT * FROM `catalog` WHERE id =$id");  
    $row = mysqli_fetch_assoc($result);
    if(!$result){
        die(mysqli_error($link));
    }
    $result = mysqli_query($link, "UPDATE `catalog` SET `name` = '$name', `descrip` = '$descrip', `price` = '$price' WHERE `id` = $id;");
?>
    <h3 class="heading">Product Update</h3>
    <?php 
        echo "<div class='product'><img class='image_img' src='{$row['adres']}' alt='img'></div>";
    ?>         
    <form enctype="multipart/form-data" method="post">
        <input type="file" name="img">
        <input type="hidden" name="id" value="<?= $id ?>">
        <p>Name:<input type="text" name="name" value="<?= $row['name'] ?>"></p>
        <p>Descrip:<input type="text" name="descrip" value="<?= $row['descrip'] ?>"></p>
        <p>Price:<input type="text" name="price" value="<?= $row['price'] ?>"></p>
        <input type="submit" value="Edit">
        <br>
        <a href="admin.php">Back to Admin</a>
    </form>
</body>
</html>
