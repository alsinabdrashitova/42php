<?php

function outputSortText()
{
    if (isset($_POST["text"])) {
        $text = $_POST["text"];
        $textArray = explode("\n", $text);
        $textSort = sortText($textArray);
        foreach ($textSort as $value){
            echo  implode(" ", $value)."<br>";
        }

    } else {
        include "dz3.html";
    }
}
outputSortText();

function sortText($textArray){
    $sortArray = array();
    $a = 0;
    $ind = 0;
    $arr = array();

    foreach ($textArray as $value){
        $sortArray[$a] = $value;
        $a++;
    }

        foreach ($textArray as $value) {
            $sortArray[$a] = explode(" ", $value);
            shuffle($sortArray[$a]);
            $sortArray[$a] = implode(" ", $sortArray[$a]);
            $a++;
        }

    foreach ($sortArray as $value){
        $arr[$ind] = explode(" ", $value);
        $ind++;
    }

    usort($arr, function ($num1, $num2){
       if (strtolower($num1[1]) < strtolower($num2[1])) {
           return -1;
       }else return 1;
    });

    return $arr;
}
?>
