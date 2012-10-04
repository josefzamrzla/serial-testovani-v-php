<?php
$GLOBALS['globalValue'] = 10;

class SomeClass
{
    public static $staticProperty = 1;

    public function getStaticValue()
    {
        $oldValue = self::$staticProperty;
        ++self::$staticProperty;

        return $oldValue;
    }

    public function getGlobalValue()
    {
        $oldValue = $GLOBALS['globalValue'];
        ++$GLOBALS['globalValue'];

        return $oldValue;
    }
}