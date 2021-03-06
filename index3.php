<?php
declare(strict_types=1);

ini_set('error_reporting', (string)E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
?>

<?php

function Myadd($a,$b){
   return $a + $b;    
}

function Mysub($a,$b){
    return $a - $b;    
}

function Mymul($a,$b){
    return $a * $b;    
}

function Mydiv($a,$b){
    return $a / $b;    
}

$a = 10;
$b = 10;

echo Myadd($a,$b);
echo '<br>';
echo Mysub($a,$b);
echo '<br>';
echo Mymul($a,$b);
echo '<br>';
echo Mydiv($a,$b);
echo '<br>';
?>