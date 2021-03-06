<?php
declare(strict_types=1);

ini_set('error_reporting', (string)E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
?>

<?php

function Myfunction($arg1,$arg2,$operation){
    if($operation == 'add'){
        return $arg1 + $arg2;
    }elseif($operation == 'sub'){
        return $arg1 - $arg2;
    }elseif($operation == 'mul'){
        return $arg1 * $arg2;
    }elseif($operation == 'div'){
        return $arg1 / $arg2;
    }
}


$a = -5;
$b = -4;
$c = 'div';
echo Myfunction($a,$b,$c);
?>