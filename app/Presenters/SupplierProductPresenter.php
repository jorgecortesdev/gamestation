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

    protected function currencyFormater($amount)
    {
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        return money_format('%.2n', $amount);
    }
}