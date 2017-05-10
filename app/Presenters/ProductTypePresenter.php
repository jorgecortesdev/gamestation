<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class ProductTypePresenter extends Presenter
{

    public function cost()
    {
        $amount = $this->quantity * $this->pivot->quantity * $this->model->activeProduct()->unit_cost;
        return money_format('%.2n', $amount);
    }

    public function activeProduct()
    {
        return $this->model->activeProduct()
            ? $this->model->activeProduct()->name
            : $this->renderBan();
    }

    public function activeProductSupplier()
    {
        return $this->model->activeProduct()
            ? $this->model->activeProduct()->supplier->name
            : $this->renderBan();
    }

    public function configurable()
    {
        return $this->model->configurable
            ? $this->renderOk()
            : $this->renderBan();
    }

    public function customizable()
    {
        return $this->model->customizable
            ? $this->renderOk()
            : $this->renderBan();
    }

    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }

    protected function renderBan()
    {
        return '<i class="fa fa-ban text-danger"></i>';
    }

    protected function renderOK()
    {
        return '<i class="fa fa-check text-success"></i>';
    }
}