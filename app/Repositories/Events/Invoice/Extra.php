<?php

namespace App\Repositories\Events\Invoice;

class Extra extends Good
{
    public function concept()
    {
        return $this->entity->name . ' <sup><small>(extra)</small></sup>';
    }

    public function quantity()
    {
        return $this->entity->pivot->quantity;
    }

    public function price()
    {
        return $this->entity->price;
    }

    public function total()
    {
        return $this->entity->price * $this->pivot->quantity;
    }
}
