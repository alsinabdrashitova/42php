<?php
function input(){
    if(isset($_POST['text'])) {
        $text = "";
        $counter = 0;
        $line = $_POST["text"];
        foreach (char($line, $counter) as $value) {
            $text .= $value;
        }
        echo $counter . "\n";
        echo $text;
    }else{
        include 'dz2.html';
    }
}
input();

function char(String $line, int &$count){
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
?>
