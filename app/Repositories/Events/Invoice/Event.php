<?php

namespace App\Repositories\Events\Invoice;

use ArrayIterator;
use IteratorAggregate;

class Event implements IteratorAggregate
{
    protected $goods = [];

    protected $total = 0;

    public function total()
    {
        return $this->total;
    }

    public function push($goods)
    {
        if ( ! is_a($goods, 'Illuminate\Database\Eloquent\Collection')) {
            $goods = collect()->push($goods);
        }

        foreach ($goods as $good) {
            $class = __NAMESPACE__ . '\\' . (new \ReflectionClass($good))->getShortName();

            if ( ! class_exists($class)) {
                throw new \Exception('Class ' . $class . ' does not exists');
            }

            $good = new $class($good);
            $this->goods[] = $good;
            $this->total += $good->total;
        }

        return $this;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->goods);
    }
}
