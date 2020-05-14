<?php
session_start();

if (isset($_REQUEST['text'])) {
    $oldStr = $_REQUEST['text'];
    $_SESSION['sess'] = $_REQUEST['text'];
    echo changeStr($oldStr);
}else include "dz12.html";

function changeStr(string $str) : string {
    require 'userForm.php';
    $text = "";
    $counter = 0;
    foreach (char($str, $counter) as $value) {
        $text .= $value;
    }
    echo $counter .'<br>';
    return $text;
}

function char(string $line, int &$count){
    for ($i = 0; $i < strlen($line); $i++){
        switch ($line[$i]){
            case 'h':
                $count++;
                yield "4";
                break;
            case 'l':
                $count++;
                yield "1";
                break;
            case 'e':
                $count++;
                yield "3";
                break;
            case 'o':
                $count++;
                yield "0";
                break;
            default:
                yield $line[$i];
        }
    }
}