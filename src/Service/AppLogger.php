<?php

namespace App\Service;

class AppLogger
{
    private $logger;

    public function __construct($type)
    {
       $this->logger = LoggerFactory::getLogger($type);
       
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}