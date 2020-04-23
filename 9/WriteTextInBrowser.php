<?php
include_once "logger.php";

class WriteTextInBrowser extends Logger{

    public $param;

    public function __construct($param)
    {
        $this->param = $param;
    }


    public function writer($text){
        date_default_timezone_set ( "Europe/Moscow" );
        $dateTime = new DateTime();
        if ($this->param == "time"){
            echo date("H:i:s ");
        }elseif ($this->param == "timeAndDate"){
            echo date("d.m.Y H:i:s ");
        }else{
            echo "";
        }
        echo $text.'<br>';
    }


}
?>
