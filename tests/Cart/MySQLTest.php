<?php
/**
 * Created by PhpStorm.
 * User: rakotomalala
 * Date: 2019-04-17
 * Time: 16:29
 */

namespace Cart;

use Cart\Store\MySQL;
use Exception;
use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;

class MySQLTest extends TestCase
{
    public function testConstructorWithPDO()
    {
        $pdoMock = $this->createMock(PDO::class);

        $store = new MySQL($pdoMock);
        $this->assertInstanceOf(MySQL::class, $store);
    }

    public function testFindExecuteReturnsFalse()
    {
        $this->expectException(Exception::class);

        $stmtMock = $this->getPDOStmtMock();
        $stmtMock->expects($this->once())->method('execute')->willReturn(false);

        $pdoMock = $this->getPDOMock($stmtMock);

        $store = new MySQL($pdoMock);
        $store->find(87);
    }

    protected function getPDOMock($pdoStmt)
    {
        $pdo = $this->getMockBuilder(PDO::class)
                    ->disableOriginalConstructor()
                    ->setMethods(['prepare'])
                    ->getMock();
        $pdo->method('prepare')->willReturn($pdoStmt);

        return $pdo;
    }

    protected function getPDOStmtMock()
    {
        return $this->getMockBuilder(PDOStatement::class)
                ->setMethods(['execute', 'fetch', 'fetchAll'])
                ->getMock();
    }
}