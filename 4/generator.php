<?php
function generator($arrGenerator, $arr2){
    $sum = $arr2["sum"];
    $arr = $arr2["data"];
    $ran = ran($sum, $arr);

    foreach ($ran as $value){
        $index = array_search($value, $arr);
         $count =  $arrGenerator[$index]["count"]++;
        $arrGenerator[$index]["calculated_probability"] = $count/10000;
    }

    return $arrGenerator;
}

function ran($sum, $arr){

    for ($i = 0; $i < 10000; $i++){
        $count = -1;
        $weight = 0;
        $ran = mt_rand(1 , $sum);

        while ($weight < $ran){
            $count++;
            $weight += (int)$arr[$count]["weight"];
        }
        yield $arr[$count];
    }
}
?>
