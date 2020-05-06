<?php
ini_set('max_execution_time', 900);
header('Content-type: text/html; charset=cp-866');
if(isset($_POST["url"])){
    $url = $_POST['url'];
    if(strpos($url, 'http') !== FALSE){
        $url_array = parse_url($url);
        $url = $url_array['host'];
    }
if (isset($_POST['ping'])) {
    ping($url);
}elseif (isset($_POST['tracert'])){
    tracert($url);
}else{
    echo "Please make a choice";
}
}else{
    include "dz7.html";
}

function ping($url){
   $command = 'ping ' . $url;
    $output = array();
    $req = "";
   exec(escapeshellcmd($command), $output);
//    foreach ($output as $value){
//        echo $value;
//    }
 //   print_r($output);
    $str =  implode('', $output);
    $address = [];
    for ($i = strpos($str, '[') + 1; $i < strpos($str, ']'); $i++){
        array_push($address, $str[$i]);
    }
    echo '<br><b>'."IP: ".'</b>';
    foreach ($address as $value){
        echo '<b>'.$value.'</b>';
    }
    for($i = strpos($str,'(') + 1; $i< strpos($str, '%'); $i++){
         $req .= $str[$i];
    }
    echo '<br>'. "The success of the request: ".(100 - $req)."%";
}

function tracert($url){
    $command = 'tracert ' . $url;
    $output = array();
    exec(escapeshellcmd($command), $output);
    $address = [];
//    foreach ($output as $value){
//        echo $value;
//    }
    $str =  implode('', $output);
    preg_match_all('~(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})~',$str,$matches);
    for ($i = strpos($str, '[') + 1; $i < strpos($str, ']'); $i++){
        array_push($address, $str[$i]);
    }
    echo '<br><b>'."IP: ".'</b>';
    foreach ($address as $value){
        echo '<b>'.$value.'</b>';
    }
    echo '<br>';
    $count = 0;
    foreach ($matches as $value => $match){
        foreach ($match as $k => $item) {
                echo $item.'<br>';
            $count++;
        }
    }
    echo '<br>'."The number of ip address: ".$count. '<br>';
 //  print_r($output);
 //   print_r($matches);
//    for ($i = 4; $i < count($output); $i++) {
//    }

}
?>

