<?php
    include("db.php");
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Document</title>
</head>
<body>
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tr>
    <th style="text-align:left;">Img</th>
    <th style="text-align:left;">Name</th>
    <th style="text-align:right;" width="5%">Quantity</th>
    <th style="text-align:right;" width="5%">Price</th>
</tr>
<?php
$login = $_SESSION['login'];
$result = mysqli_query($link, "SELECT * FROM `cart` WHERE `login` = '$login'");
if(!$result){
    die(mysqli_error($link));
}
while($row = mysqli_fetch_assoc($result)){
    $sum = $row['price'] * $row['quantity'];
    $total_quantity += $row['quantity'];
    $total_sum += $sum;
echo "
<tr>
    <td><img src='{$row['adres']}' style='width: 100px;'/></td>
    <td>{$row['name']}</td>
    <td style='text-align:right;'>{$row['quantity']}</td>
    <td  style='text-align:right;'>$sum</td>
</tr>
";
}
echo "
<tr>
    <td colspan='2' align='right'>Total:</td>
    <td align='right'>$total_quantity</td>
    <td align='right' colspan='2'><strong>$total_sum</strong></td>
</tr>
";
//Можно было бы добавить кнопку удаления товара или изменить количество товаров прямо в корзине. 
//Но этого в задании небыло. И кстати сделать карзину через базу данных 100 раз проще чем в сессии по крайней мере я так и не понял как это сделать.
?>

</table>
<?php
echo "<a href='index.php'>Back</a>";
?>	
</body>
</html>