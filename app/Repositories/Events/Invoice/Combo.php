<?php

namespace App\Repositories\Events\Invoice;

class Combo extends Good
{
    public function concept()
    {
        return 'Paquete ' . $this->entity->name;
    }

    public function quantity()
    {
        return 1;
    }

    public function price()
    {
        return $this->entity->price;
    }

    public function total()
    {
        return $this->entity->price;
    }
}
