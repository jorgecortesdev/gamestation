<?php
namespace App\Presenters;

use App\Library\Helper;
use Laracodes\Presenter\Presenter;

class ProductPresenter extends Presenter
{
    public function quantity()
    {
        return number_format($this->model->quantity);
    }

    public function iva()
    {
        return Helper::currencyFormater($this->model->iva);
    }

    public function price()
    {
        return Helper::currencyFormater($this->model->price);
    }

    public function total()
    {
        return Helper::currencyFormater($this->model->total);
    }

    public function isActive()
    {
        return $this->model->is_active ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>';
    }

    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }

    public function updatedAt()
    {
        return $this->model->updated_at->format('d.m.Y');
    }
}