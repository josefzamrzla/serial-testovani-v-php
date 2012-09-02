<?php
class ContainsSubstringConstraint extends PHPUnit_Framework_Constraint
{
    private $needle;

    /**
     * @param string $needle
     */
    public function __construct($needle)
    {
        if (!((is_string($needle) || is_numeric($needle)) && strlen($needle))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $this->needle = (string)$needle;
    }

    public function toString()
    {
        return "string array contains ";
    }

    /**
     * @param mixed $other
     * @return bool
     * @throws InvalidArgumentException
     */
    protected function matches($other)
    {
        if (!(((is_array($other) && count($other))) || ($other instanceof Traversable))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'array');
        }

        foreach ($other as $item) {
            if (is_string($item) && strstr($item, $this->needle) !== false) {
                return true;
            }
        }

        return false;
    }

    protected function failureDescription($other)
    {
        return $this->toString() . PHPUnit_Util_Type::export($this->needle);
    }
}