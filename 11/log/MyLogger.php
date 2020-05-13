<?php

namespace log;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class MyLogger extends AbstractLogger implements LoggerInterface{

    private $filename;


    public function __construct($filename)
    {
        $this->filename = $filename;
    }


    public function log($level, $message, array $context = array()){

        $json = json_encode([
            "level" => $level,
            "date" => date("H:i:s"),
            "message" => $message
        ], JSON_UNESCAPED_UNICODE);

        fwrite(fopen($this->filename, "w"), $json);
    }




}
