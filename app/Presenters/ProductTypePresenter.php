<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class ProductTypePresenter extends Presenter
{

    public function activeProduct()
    {
        return $this->model->supplier_product_id
            ? $this->model->supplierProduct->name
            : $this->renderUndefined();
    }

    public function activeSupplier()
    {
        return $this->model->supplier_id
            ? $this->model->supplier->name
            : $this->renderUndefined();
    }

    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }

    protected function renderUndefined()
    {
        return '<i class="fa fa-ban text-danger"></i>';
    }

}