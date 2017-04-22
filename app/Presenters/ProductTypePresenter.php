<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class ProductTypePresenter extends Presenter
{

    public function activeProduct()
    {
        return $this->model->supplier_product_id
            ? $this->model->supplierProduct->name
            : $this->renderBan();
    }

    public function activeProductSupplier()
    {
        return $this->model->supplier_product_id
            ? $this->model->supplierProduct->supplier->name
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

    public function renderType()
    {
        return $this->model->render_type_id
            ? $this->model->renderType->name
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