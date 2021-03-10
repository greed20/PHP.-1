<?php
function myfun($string){
    $arr1 = explode(' ', $string);
    echo implode('_', $arr1);
};
myfun('my day is good');
?>
