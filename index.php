<?php

class Collection implements Iterator
{
    private $data = [];

    public function __construct()
    {
        $this->data[] = 'one';
        $this->data[] = 'two';
        $this->data[] = 'three';
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return next($this->data);
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return key($this->data) !== null;
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        reset($this->data);
    }
}

$newCollection = new Collection();

foreach ($newCollection as $value) {
    echo $value . '<br>';
}
