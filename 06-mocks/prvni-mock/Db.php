<?php
require_once "Logger.php";

class Db
{
    /**
     * @var Logger
     */
    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function execute($query)
    {
        // ...

        $this->logger->log("Query: " . $query);
    }
}