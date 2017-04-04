<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class SupplierProductPresenter extends Presenter
{
    public function quantity()
    {
        return number_format($this->model->quantity);
    }

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
        return $this->currencyFormater($this->model->total);
    }

    public function unitCost()
    {
        return $this->currencyFormater($this->model->unit_cost);
    }

    protected function currencyFormater($amount)
    {
        return money_format('%.2n', $amount);
    }

    public function isActive()
    {
        return $this->model->is_active ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>';
    }

    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }
}