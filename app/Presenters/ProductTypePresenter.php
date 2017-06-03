<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class ProductTypePresenter extends Presenter
{
    public function price()
    {
        $amount = $this->quantity * $this->pivot->quantity * $this->model->activeProduct->price;
        return money_format('%.2n', $amount);
    }

    public function product()
    {
        return $this->model->activeProduct
            ? $this->model->activeProduct->name
                . '<br> <small>( '
                . $this->model->activeProduct->supplier->name
                . ' )</small>'
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