<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class ComboItemPresenter extends Presenter
{
    public function price()
    {
        return $this->currencyFormater(
            $this->model->product->unit_cost * $this->model->quantity
        );
    }

    protected function currencyFormater($amount)
    {
        return money_format('%.2n', $amount);
    }
}