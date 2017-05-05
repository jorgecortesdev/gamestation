<?php

namespace App\Library\Invoice;

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
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        return money_format('%.2n', $this->entity->price);
    }

    public function total()
    {
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        return money_format('%.2n', $this->entity->price);
    }
}
