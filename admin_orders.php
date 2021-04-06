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
<h3 class='heading'><a href='admin.php'>Admin</a>/<a href='add.php'>Product Add</a>/Orders</h3>

<?php
//Использовал похожий вывод как и в корзине так как не знал как лучше это показать.
$result = mysqli_query($link, "SELECT * FROM `order`");
if(!$result){
    die(mysqli_error($link));
}
while($row = mysqli_fetch_assoc($result)){
    $total_quantity = 0;
    $total_sum = 0;
    $name = $row['name'];
    $phone = $row['phone'];
    $adres = $row['adres'];
    $login = $row['login'];
    echo "
    <table style='margin: 20px;' class='tbl-cart' cellpadding='10' cellspacing='1'>
    <tr>
        <th style='text-align:left;'>Name</th>
        <th style='text-align:left;'>phone</th>
        <th style='text-align:right;' width='5%'>Adres</th>
        <th style='text-align:right;' width='5%'>Login</th>
    </tr>
    <tr>
        <td>{$row['name']}</td>
        <td>{$row['phone']}</td>
        <td style='text-align:right;'>{$row['adres']}</td>
        <td style='text-align:right;'>{$row['login']}</td>
    </tr>
    ";
    $result1 = mysqli_query($link, "SELECT * FROM `order_item` WHERE `login` = '$login'");
    if(!$result1){
        die(mysqli_error($link));
    }
    while($row1 = mysqli_fetch_assoc($result1)){
        $sum = $row1['price'] * $row1['quantity'];
        $total_quantity += $row1['quantity'];
        $total_sum += $sum;
    echo "
    <tr>
        <td><img src='{$row1['adres']}' style='width: 100px;'/></td>
        <td>{$row1['name']}</td>
        <td style='text-align:right;'>{$row1['quantity']}</td>
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
    </table>
    ";
}
?>

</body>
</html>