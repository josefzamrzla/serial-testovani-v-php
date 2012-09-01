<?php
class AssertCountTest extends PHPUnit_Framework_TestCase
{
    public function testAssertCount()
    {
        $this->assertCount(2, array(1, 2));
        $this->assertCount(2, new ArrayIterator(array(1, 2)));
    }
}