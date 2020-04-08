<?php
define("fileName" , "dz6.txt" );

if (filesize(fileName) == 0){
    echo "Empty file";
}
$arr = parse_ini_file("index.ini", true );

$file_link = $arr['main']['filename'];

foreach (file($file_link) as $line) {
    if (strpos($line, $arr['first_rule']['symbol']) === 0) {
        $my_line = substr($line, strlen($arr['first_rule']['symbol']));
        if ($arr['first_rule']['upper'] == "true") {
            echo strtoupper($my_line) . '<br>';
        } else if ($arr['first_rule']['upper'] == "false") {
            echo strtolower($my_line) . '<br>';
        } else {
            echo $line . "  error: only true or false" . '<br>';
        }
    }
    elseif (strpos($line, $arr['second_rule']['symbol']) === 0){
        if ($arr['second_rule']['direction'] == '+'){
            for ($i = strlen($arr['second_rule']['direction']); $i < strlen($line); $i++) {
                if ($line[$i] == '9'){
                    echo '0';
                }else if ($line[$i] >= '0' && $line[$i] < '9'){
                    echo $line[$i] + 1;
                }else{
                    echo $line[$i];
                }
            }
        }elseif ($arr['second_rule']['direction'] == '-'){
            for ($i = strlen($arr['second_rule']['direction']); $i < strlen($line); $i++){
                if ($line[$i] == '0'){
                    echo 9;
                }elseif ($line[$i] > '0' && $line[$i] <= '9'){
                    echo $line[$i] - 1;
                }else{
                    echo $line[$i];
                }
            }
        }else{
            echo $line . "  error: only + or -".'<br>';
        }
        echo '<br>';
    }
    elseif (strpos($line, $arr['third_rule']['symbol']) === 0){
        for ($i = strlen($arr['third_rule']['symbol']); $i < strlen($line); $i++) {
            if ($line[$i] != $arr['third_rule']['delete']){
                echo $line[$i];
            }
        }echo '<br>';
    }else{
        echo $line.' <br>';
    }

}
?>
