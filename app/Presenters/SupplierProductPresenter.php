<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class SupplierProductPresenter extends Presenter
{
    public function iva()
    {
        return $this->currencyFormater($this->model->iva);
    }

    public function price()
    {
        return $this->currencyFormater($this->model->price);
    }

    public function total()
    {
        return $this->currencyFormater($this->calculateTotal);
    }

    public function unitCost()
    {
        return $this->currencyFormater($this->calculateTotal / $this->model->quantity);
    }

    protected function calculateTotal()
    {
        return $this->model->price + $this->model->iva;
    }

    protected function currencyFormater($amount)
    {
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        return money_format('%.2n', $amount);
    }
}