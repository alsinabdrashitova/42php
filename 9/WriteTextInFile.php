<?php
include_once "logger.php";

class WriteTextInFile extends Logger{

    public $file;

    public function __construct($filename)
    {
        $this->file = fopen($filename, 'w');
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    function writer($text)
    {
        fwrite($this->file, $text."\n");
    }
}
?>
