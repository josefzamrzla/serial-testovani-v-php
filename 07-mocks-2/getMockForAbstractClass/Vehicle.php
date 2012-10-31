<?php
abstract class Vehicle
{
    public function canFly()
    {
        return $this->hasWings();
    }

    abstract public function hasWings();
}