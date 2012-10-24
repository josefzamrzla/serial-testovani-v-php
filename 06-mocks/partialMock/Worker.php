<?php
class Worker
{
    public function checkResults()
    {
        if ($this->work() === true) {
            return "OK";
        }

        return "NOT YET";
    }

    public function work()
    {
        // ... doing some hard job ...
        return true;
    }
}