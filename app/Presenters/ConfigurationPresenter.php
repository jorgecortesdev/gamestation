<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class ConfigurationPresenter extends Presenter
{

    public function selected()
    {
        return $this->product
            ? $this->renderCheck() . ' ' . $this->model->product->name
            : $this->renderBan;
    }

    protected function renderBan()
    {
        return '<i class="fa fa-ban text-danger"></i>';
    }

    protected function renderCheck()
    {
        return '<i class="fa fa-check-square-o"></i>';
    }
}