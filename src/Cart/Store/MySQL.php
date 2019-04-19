<?php
/**
 * Created by PhpStorm.
 * User: rakotomalala
 * Date: 2019-04-17
 * Time: 15:33
 */

namespace Cart\Store;

use Cart\Product;
use Cart\ProductStoreInterface;
use PDO;
use Exception;

class MySQL implements ProductStoreInterface
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @inheritDoc
     */
    public function add(Product $product): ProductStoreInterface
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    public function update(Product $product): ProductStoreInterface
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function remove(Product $product): ProductStoreInterface
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function find($id): ?Product
    {
        $sql = 'SELECT * FROM product WHERE id=?';
        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute([$id]) === false) {
            throw new Exception('unable to exeute query');
        }
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        if ($data ===false) {
            return null;
        }
        return $this->map($data);
    }

    /**
     * @inheritDoc
     */
    public function findAll(): ResultSetInterface
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param \stdClass $data
     * @return Product
     */
    protected function map(\stdClass $data): Product
    {
        $product = new Product($data->od, $data->name, $data->price);
        $product->setDescription($data->descritption);

        return $product;
    }
}
