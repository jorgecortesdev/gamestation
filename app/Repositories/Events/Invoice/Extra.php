<?php

namespace App\Repositories\Events\Invoice;

class Extra extends Good
{
    public function concept()
    {
        return $this->entity->name;
    }

    public function quantity()
    {
        return $this->entity->pivot->quantity;
    }

    public function price()
    {
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        return money_format('%.2n', $this->entity->price);
    }

    public function total()
    {
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $amount = $this->entity->price * $this->pivot->quantity;
        return money_format('%.2n', $amount);
    }
}
