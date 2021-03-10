<?php
function Myfun($a, $b){
    do{
        if($a == 0){
            echo $a . ' - ноль.' . '<br>';
        }elseif($a % 2 == 0){
            echo $a . ' - четное число.' . '<br>';
        }else{
            echo $a . ' - нечетное число.' . '<br>';
        }
        $a++;
    }while($a <= $b);
}

Myfun(0,10);
?>
