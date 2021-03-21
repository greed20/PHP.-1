<?php
//Поменял вывод галереи с помощью файлов на вывод с помощью данных с базы данных.
$result = mysqli_query($link, "SELECT * FROM `catalog`");
if(!$result){
    die(mysqli_error($link));
}

echo "<div class='catalog'><h3 class='heading'>Product Catalog</h3>";
$i = 0;
while($row = mysqli_fetch_assoc($result)){
    //Делает вывод каталога так чтобы в 1 линии могли быть только 5 товаров.
    if($i == 0 || $i % 5 == 0){
        echo "<div class='card-box'>";
    }
    echo    "<div class='card'>
                <img class='card__img' src='{$row['adres']}' alt='img'>
                <h4 class='heading-mini'>{$row['name']}</h4>
                <p class='text'>{$row['descrip']}</p>
                <p class='text'>Price: {$row['price']}</p>
                <a class='card__link' href='product.php?id={$row['id']}'>More</a>
            </div>";
    //Делает вывод каталога так чтобы в 1 линии могли быть только 5 товаров.
    $i = $i + 1;
    if($i % 5 == 0){
        echo "</div>";
    }
}

if($i % 5 != 0){
    echo "</div>";
}

echo "</div>";

?>