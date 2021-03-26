<?php
if(isset($_SESSION['login'])){
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
            <form enctype='multipart/form-data' method='post'>
                <img class='card__img' src='{$row['adres']}' alt='img'>
                <h4 class='heading-mini'>{$row['name']}</h4>
                <p class='text'>{$row['descrip']}</p>
                <p class='text'>Price: {$row['price']}</p>
                <a class='card__link' href='product.php?id={$row['id']}'>More</a>
                <input type='hidden' name='adres' value='{$row['adres']}'>
                <input type='hidden' name='name' value='{$row['name']}'>
                <input type='hidden' name='price' value='{$row['price']}'>
                <p>Quantity: <input type='text' name='quantity'></p>
                <input type='submit' value='Add to card' name='submit'>
            </form>
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


//При нажатии на кнопку сделает запись в базе данных.
if(isset($_POST["submit"])){
    $login = $_SESSION['login'];
    $adres = htmlspecialchars($_POST["adres"]);
    $name = htmlspecialchars($_POST["name"]);
    $price = htmlspecialchars($_POST["price"]);
    $quantity = htmlspecialchars($_POST["quantity"]);
    $result = mysqli_query($link, "INSERT INTO `cart` (`login`, `adres`, `name`, `price`, `quantity`) VALUES ('$login', '$adres', '$name', '$price', '$quantity')");
}


}
?>