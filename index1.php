<?php
declare(strict_types=1);

ini_set('error_reporting', (string)E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
?>

<?php

function Myfunction($a,$b){
    if($a >= 0 && $b >= 0){
        $a = $a - $b;
        return $a;
    }elseif($a < 0 && $b < 0){
        $a = $a * $b;
        return $a;
    }else{
        $a = $a + $b;
        return $a;
    }    
}

$a = -5;
$b = -4;

echo Myfunction($a,$b);
?>