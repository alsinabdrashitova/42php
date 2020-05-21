<?php

namespace log;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class MyLogger extends AbstractLogger implements LoggerInterface{

    private $filename;
    private $file;

    private $counter = 1;

    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->file = fopen($filename, "w");
        fwrite($this->file, "[");
    }

    public function __destruct()
    {
        fwrite($this->file, "]");
        fclose($this->file);
    }


    public function log($level, $message, array $context = array()){

        if ($this->counter == 1){
            $json = json_encode([
                "level" => $level,
                "date" => date("H:i:s"),
                "message" => $message
            ], JSON_UNESCAPED_UNICODE);
            $this->counter++;
            fwrite($this->file, $json);
        }else{
            $json = json_encode([
                "level" => $level,
                "date" => date("H:i:s"),
                "message" => $message
            ], JSON_UNESCAPED_UNICODE);
            fwrite($this->file, ','.$json);
        }
    }
}
