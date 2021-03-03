<?php
declare(strict_types=1);

ini_set('error_reporting', (string)E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
?>
<?php
$h1 = '<h1>Hello</h1>';
$title = '<title>PhpDocument</title>';
$time = date("Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        echo $title;
    ?>
</head>
<body>
<?php
    echo $h1;
    echo $time;
?>
</body>
</html>