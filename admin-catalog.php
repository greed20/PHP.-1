<?php
if(isset($_SESSION['login']) && $_SESSION['role'] == 'admin'){

//Поменял вывод галереи с помощью файлов на вывод с помощью данных с базы данных.
$result = mysqli_query($link, "SELECT * FROM `catalog`");
if(!$result){
    die(mysqli_error($link));
}

echo "<div class='catalog'><h3 class='heading'>Admin/<a href='add.php'>Product Add</a>/<a href='admin_orders.php'>Orders</a></h3>";
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
                <a class='card__link' href='update.php?id={$row['id']}'>Edit</a>
                <a class='card__link' href='delete.php?id={$row['id']}'>Delet</a>
            </div>";
    $i = $i + 1;
    if($i % 5 == 0){
        echo "</div>";
    }
}
//Делает вывод каталога так чтобы в 1 линии могли быть только 5 товаров.
if($i % 5 != 0){
    echo "</div>";
}

echo "</div>";
}else{
    header("Location: index.php");
}
?>