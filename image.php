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
        if(!empty($_GET['id'])){
            include("db.php");
            $result = mysqli_query($link, "SELECT * FROM gallery WHERE id = {$_GET['id']}");
            if(!$result){
                die(mysqli_error($link));
            }
            $row = mysqli_fetch_assoc($result);
            echo "<img src='{$row['adres']}' alt=".img." class=".image_img.">";
            echo "<br><a href='index.php'><img src='img/back.png' alt=".img." class=".back_img."></a>";
            //Изменил вывод в другой вкладке и добавил кнопку возврата в галерею.
        }
    ?>
</body>
</html>