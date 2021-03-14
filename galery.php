<?php
    $dir    = './img';
    $img = scandir($dir);

    foreach($img as $imgs){
        if($imgs != '.' && $imgs != '..'){
            echo "<a href=".'img/'.$imgs." target="._blank."><img src=".'img/'.$imgs." alt=".img." class=".galery_img."></a>";
        }
    }
?>