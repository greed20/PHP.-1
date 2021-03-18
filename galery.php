<?php
//Поменял вывод галереи с помощью файлов на вывод с помощью данных с базы данных.
$result = mysqli_query($link, "SELECT * FROM gallery");
if(!$result){
    die(mysqli_error($link));
}
while($row = mysqli_fetch_assoc($result)){
    echo "<a href='image.php?id={$row['id']}'><img src='{$row['adres']}' alt=".img." class=".galery_img."></a>";
}
?>