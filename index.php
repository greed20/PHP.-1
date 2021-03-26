<?php
    include("db.php");
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }
    //Везде добавил условия чтобы нельзя было войти куда захочется.
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
    echo "Hello {$_SESSION['login']} <a href='logout.php'>Logout </a><a href='cart.php'> Cart</a>";
    include("catalog.php");
    mysqli_close($link);
?>

</body>
</html>