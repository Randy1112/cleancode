<?php
namespace Cart;
use Cart\Store\Mock;
use PHPUnit\Framework\TestCase;
class MockTest extends TestCase
{
    /**
     * @var ProductStoreInterface
     */
    private $store;
    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $this->store = new Mock();
    }
    public function testConstructor()
    {
        $this->assertCount(0, $this->store->findAll());
    }
}