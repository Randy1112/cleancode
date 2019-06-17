<?php

namespace Aston;

use PHPUnit\Framework\TestCase;
use Aston\Hello;

class HelloTest extends TestCase
{
    public function testHello()
    {
        $this->assertEquals('Hello, Cleancode', new Hello());
        $this->assertEquals('Hello, Cleancode', new Hello());
    }
}