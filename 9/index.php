<?php
include_once "WriteTextInBrowser.php";
include_once "WriteTextInFile.php";


if (isset($_POST["text"])){

    $text = explode(PHP_EOL, $_POST["text"] );

    $type = $_POST["type"];

    $arr = [];
    $arr = workLine($text);

    if ($type == "file"){
        $fileName = $_POST["name"];
        writeFile($fileName, $arr);
    }elseif ($type == "browser"){
        $time = $_POST["time"];
        writeBrowser($time, $arr);
    }



}else include "dz9.html";

function workLine($text){
    $lines = [];
    foreach ($text as $line){
        if (preg_match('/[A-Z]/', $line)){
              array_push($lines,"Строка ".$line." содержит заглавные буквы");
        }else{
            array_push($lines,"Строка ".$line." не содержит заглавные буквы");
        }
    }
    return $lines;
}

function writeFile($fileName, $arr){
    $logger = new WriteTextInFile($fileName);
    for ($i = 0; $i < count($arr); $i++){
        $logger->writer($arr[$i]);
    }
}

function writeBrowser($time, $arr){
  $logger = new WriteTextInBrowser($time);
    for ($i = 0; $i < count($arr); $i++){
        $logger->writer($arr[$i]);
    }
}
?>
