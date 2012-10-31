<?php
class Logger
{
    protected $directory;

    public function __construct($dir)
    {
        $this->directory = $dir;
    }

    public function log($message)
    {
        $fp = fopen($this->directory."/log.txt", "a");
        fwrite($fp, $message . "\n");
        fclose($fp);
    }
}