<?php
    include("db.php");
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }
    if(isset($_POST['submit'])){
        $login = $_SESSION['login'];
        $adres = htmlspecialchars($_POST["adres"]);
        $name = htmlspecialchars($_POST["name"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $result = mysqli_query($link, "INSERT INTO `order` (`name`, `phone`, `adres`, `login`) VALUES ('$name', '$phone', '$adres', '$login')");
        $result1 = mysqli_query($link, "SELECT * FROM `cart` WHERE `login`= '$login'");
        if(!$result1){
            die(mysqli_error($link));
        }
        while($row = mysqli_fetch_assoc($result1)){
            $adres = $row['adres'];
            $name = $row['name'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $result = mysqli_query($link, "INSERT INTO `order_item` (`login`, `adres`, `name`, `price` , `quantity`) VALUE ('$login', '$adres', '$name', '$price' , '$quantity')");
        }
        $result2 = mysqli_query($link, "DELETE FROM `cart` WHERE `login`= '$login'");
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="order.css">
    <title>Document</title>
</head>
<body>
<form method="post">
    <p>Name: <input type="text" name="name"></p>
    <p>Phone: <input type="text" name="phone"></p>
    <p>Adres: <input type="text" name="adres"></p>
    <input type="submit" name="submit">
</form>
</body>
</html>
