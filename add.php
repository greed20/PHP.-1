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
        if(isset($_FILES['img'])){
            $upload_dir = './img';   
            $tmp_name = $_FILES["img"]["tmp_name"];
            $adres = basename($_FILES["img"]["name"]);
            $type = $_FILES["img"]["type"];
            $size = $_FILES["img"]["size"];
            $type_check = ['image/png','image/jpeg','image/svg+xml'];
            $descrip = htmlspecialchars($_POST["descrip"]);
            $name = htmlspecialchars($_POST["name"]);
            $price = htmlspecialchars($_POST["price"]);
            //Проверка соответствует ли файл хотябы 1 из разрешённых типов файла.
            foreach($type_check as $check){
                if($type != $check){
                    $type_accept = false;
                }else{
                    $type_accept = true;
                    break;
                }
            }
            //Проверка размера файла и соответствия типа файла.
            if($size > 2097152){
                echo 'Erorr: File size is more that 2mb!<br>';
            }elseif($type_accept){
                //После того как все проверки пройдены. Добавляет файл на "сервер" и данные о файле на базу данных.
                move_uploaded_file($tmp_name, "$upload_dir/$adres");
                $result = mysqli_query($link, "INSERT INTO `catalog` (`adres`, `name`, `size`, `descrip`, `price`) VALUES ('img/$adres', '$name', '$size', '$descrip', '$price')");
                if(!$result){
                    die(mysqli_error($link));
                }
            }else{
                echo 'Erorr: File type is not correct(png jpg svg)!<br>';
            }
        }
?>
    <h3 class='heading'><a href='admin.php'>Admin </a>Product Add</h3>
    <form enctype="multipart/form-data" method="post">
        <input type="file" name="img">
        <p>Name:<input type="text" name="name"></p>
        <p>Descrip:<input type="text" name="descrip"></p>
        <p>Price:<input type="text" name="price"></p>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>

 