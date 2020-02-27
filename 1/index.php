<?php

//ура, я сделяль


//if(isset($_POST['submit'])) {
  //  $input = "++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.";
//$arr_input = array_values(array_filter(preg_split("//", $input)));
//}
$input = $_POST['inputtext'];
$text = $_POST['brainfuck'];

$arr = array(0);
for($i = 0; $i < strlen($text) ; $i++){
    $arr[$i] = 0;
}
$count = 0;
$counter2 = 0;


for ($i = 0; $i < strlen($text) ; $i++) {
    switch ($text[$i]) {
        //перейти к следующей ячейке
        case ">":
            $count++;
            break;

        //перейти к предыдущей ячейке
        case "<":
            $count--;
            break;

        //увеличить значение в текущей ячейке на 1
        case "+":
            $arr[$count]++;
            if($arr[$count] == '256'){
                $arr[$count] = 0;
            }
            break;

        //уменьшить значение в текущей ячейке на 1
        case "-":
            $arr[$count]--;
            if($arr[$count] == '-1'){
                $arr[$count] = 255;
            }
            break;

        //напечатать значение из текущей ячейки
        case ".":
            echo chr($arr[$count]);
            break;

        //ввести извне значение и сохранить в текущей ячейке
          case ",":
          $arr[$count] = ord($input[$counter2]);
          $counter2++;
          break;

        // если значение текущей ячейки ноль, перейти вперёд по тексту программы на ячейку, следующую за соответствующей ] (с учётом вложенности!)
        case "[":
            if ($arr[$count] == 0) {
                $a = 1;
                while ($a) {
                    $i++;
                    if ($text[$i] == '[') {
                        $a++;
                    } elseif ($text[$i] == ']') {
                        $a--;
                    }
                }
            }
            break;

        //  если значение текущей ячейки не нуль, перейти назад по тексту программы на символ [ (с учётом вложенности!)
        case "]":

            if ($arr[$count] != 0){
                $a = 1;
                while ($a != 0) {
                    $i--;
                    if ($text[$i] == ']') {
                        $a++;
                    } elseif ($text[$i] == '[') {
                        $a--;
                    }
                }
            }
            break;
        }

}
?>