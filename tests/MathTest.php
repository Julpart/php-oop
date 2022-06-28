<?php

class MathTest extends PHPUnit\Framework\TestCase
{
    public function testFactorial()
    {
        $my = new \app\traits\MathClass();
        $this->assertEquals(120, $my->factorial(5));
    }
}
