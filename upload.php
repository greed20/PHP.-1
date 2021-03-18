<?php
        if(isset($_FILES['img'])){
            $upload_dir = './img';   
            $tmp_name = $_FILES["img"]["tmp_name"];
            $name = basename($_FILES["img"]["name"]);
            $type = $_FILES["img"]["type"];
            $size = $_FILES["img"]["size"];
            $type_check = ['image/png','image/jpeg','image/svg+xml'];
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
                move_uploaded_file($tmp_name, "$upload_dir/$name");
                $result = mysqli_query($link, "INSERT INTO `gallery` (`adres`, `name`, `size`) VALUES ('img/$name', '$name', '$size')");
                if(!$result){
                    die(mysqli_error($link));
                }
            }else{
                echo 'Erorr: File type is not correct(png jpg svg)!<br>';
            }
        }
    ?> 