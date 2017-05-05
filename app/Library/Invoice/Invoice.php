<?php

namespace App\Library\Invoice;

use ArrayIterator;
use IteratorAggregate;

class Invoice implements IteratorAggregate
{
    protected $goods = [];

    public function push($goods)
    {
        if ( ! is_a($goods, 'Illuminate\Database\Eloquent\Collection')) {
            $goods = collect()->push($goods);
        }

        foreach ($goods as $good) {
            $class = __NAMESPACE__
                . '\\'
                . (new \ReflectionClass($good))->getShortName();

            if (class_exists($class)) {
                $this->goods[] = new $class($good);
                continue;
            }

            throw new \Exception('Class ' . $class . ' does not exists');
        }
    }

    public function getIterator()
    {
        return new ArrayIterator($this->goods);
    }
}
