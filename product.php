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
        if(!empty($id)){
            include("db.php");
            $result = mysqli_query($link, "SELECT * FROM `catalog` WHERE id = $id");
            if(!$result){
                die(mysqli_error($link));
            }
            $row = mysqli_fetch_assoc($result);
            echo    "<div class='product'>
                        <img class='image_img' src='{$row['adres']}' alt='img'>
                        <h4 class='heading-mini'>{$row['name']}</h4>
                        <p class='text'>{$row['descrip']}</p>
                        <p class='text'>Price: {$row['price']}</p>
                    </div>";                 
            echo "<br><a href='index.php'><img src='img/back.png' alt='img' class='back_img'></a>";
            //Изменил вывод в другой вкладке и добавил кнопку возврата в галерею.
        }
    ?>
</body>
</html>