<?php
class SomeClass
{
    public function throwsInvalidArgumentException()
    {
        throw new InvalidArgumentException();
    }

    public function shouldThrowExceptionButDoesNot()
    {
        // throw new InvalidArgumentException();

        // bad logic error!
        explode("foo");

        return false;
    }
}