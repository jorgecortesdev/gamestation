<?php

namespace App\Library\Invoice;

use Illuminate\Database\Eloquent\Model;

abstract class Good
{
    protected $entity;

    function __construct(Model $entity)
    {
        $this->entity = $entity;
    }

    abstract public function concept();

    abstract public function quantity();

    abstract public function price();

    abstract public function total();

    public function __get($property)
    {
        $camel_property = camel_case($property);

        if (method_exists($this, $camel_property)) {
            return $this->{$camel_property}();
        }

        return $this->entity->{snake_case($property)};
    }
}
