<?php
/**
 * Created by PhpStorm.
 * User: rakotomalala
 * Date: 2019-04-16
 * Time: 10:06
 */

namespace Aston;

use PHPUnit\Framework\TestCase;

use InvalidArgumentException;
use TypeError;


class MathTest extends TestCase
{
    public function testDivision()
    {
        $this->assertEquals(
            [
                'resultat' => 20,
                'reste' => 0
            ],
            Math::divide(100, 5)
        );
    }

    public function testDivisionParZero()
    {
        $this->expectException(InvalidArgumentException::class);
        Math::divide(100, 0);
    }

    public function testValeursNonNumeriques()
    {
        $this->expectException(TypeError::class);
        Math::divide('Tata', 'Toto');
    }
}