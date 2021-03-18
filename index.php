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
        include("db.php");
        include("upload.php");
        include("galery.php");
    ?>
    <form enctype="multipart/form-data" method="post">
        <input type="file" name="img">
        <input type="submit" value="Отправить">
    </form>
    <?php
        mysqli_close($link);
    ?>
</body>
</html>