<?php
if (isset($_POST['mon'])) {
    $month = $_POST['mon'];
     if ($month == '' || $month == 'текущий месяц'){
        $month = date('m');
    }
     echo "Ваш месяц: ".$month.'<br>';
     $Day = mktime(0, 0, 0, $month);

    $count = 1;

    $day = date('t', $Day);

    echo "Количество дней в месяце:".$day.'<br>';

//    if($month == date('m')){
//        $currentDay = date('d');
//        echo "Текущий день: ".$currentDay;
//    }

    $arr = array();
    $countweek = 0;

    $firstday = new DateTime();
    $firstday -> setDate(date('Y'), $month, $count);
    $interval = new DateInterval('P1D');
    $period = new DatePeriod($firstday, $interval, $day - 1);
    foreach ($period as $value){
        $weekday = date('w', mktime(0, 0, 0, $month, $count, date('Y')) );
        $weekday = $weekday - 1;
        if ($weekday == -1) {
            $weekday = 6;
        }

        $arr[$countweek][$weekday] = $count;
        $count++;

        if ($weekday == 6){
            $countweek++;
        }


    }





    echo "<table border=2>";
    for ($i = 0; $i < count($arr); $i++) {

        echo "<tr>";

        for ($j = 0; $j < 7; $j++) {

            if (!empty($arr[$i][$j])) {

                if (($j == 5 || $j == 6) && ($month == date('m') and $arr[$i][$j] == date('d')) ){
                    echo "<td><font color=green><b>" . $arr[$i][$j] . "</b></font></td>";
                }else if ($month == date('m') and $arr[$i][$j] == date('d') ) {
                    echo "<td><b>" . $arr[$i][$j] . "</b></td>";
                } else if ($j == 5 || $j == 6) {
                    echo "<td><font color=red>" . $arr[$i][$j] . "</font></td>";
                    }
                else echo "<td>" . $arr[$i][$j] . "</td>";

            } else echo "<td></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}else{
    include 'dz8.html';
}

?>
