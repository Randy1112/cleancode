<?php
/**
 * Created by PhpStorm.
 * User: rakotomalala
 * Date: 2019-04-15
 * Time: 14:42
 */

namespace Aston;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class AccountTest extends TestCase
{
    public function testConstructorBalanceZero()
    {
        $account = new Account(1234);

        $this->assertEquals(1234, $account->getNumber());
        $this->assertEquals(0, $account->getBalance());
    }

    public function testIncreaseBalanceWithNegativeValue()
    {
        $this->expectException(InvalidArgumentException::class);

        $account = new Account(1234, 200);
        $account->increase(-100);
    }

    public function testIncreaseBalance()
    {
        $account = new Account(1234, 600);
        $account->increase(100);
        $this->assertEquals(700, $account->getBalance());
    }

    public function testDecreaseBalance()
    {
        $account = new Account(4569, 265);
        $account->decrease(50);
        $this->assertEquals(215, $account->getBalance());
    }
}