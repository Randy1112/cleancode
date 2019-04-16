<?php
/**
 * Created by PhpStorm.
 * User: rakotomalala
 * Date: 2019-04-15
 * Time: 14:42
 */

namespace Aston;

use InvalidArgumentException;

class Account
{
    /**
     * @var int
     */
    private $number;

    /**
     * @var float
     */
    private $balance;

    /**
     * Account constructor.
     *
     * @param int $number
     * @param float $balance
     */
    public function __construct(int $number, float $balance = 0)
    {
        $this->setNumber($number)
            ->setBalance($balance);
    }


    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Account
     */
    public function setNumber(int $number): Account
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     * @return Account
     */
    public function setBalance(float $balance): Account
    {
        $this->balance = $balance;
        return $this;
    }

    public function increase(float $insertion): void
    {
        if ($insertion < 0) {
            throw new InvalidArgumentException("Montant négatif interdit !");
        }

        $this->balance += $insertion;
    }

    public function decrease(float $insertion): void
    {
        if ($insertion < 0) {
            throw new InvalidArgumentException("Montant négatif interdit !");
        }

        $this->balance -= $insertion;
    }
}
