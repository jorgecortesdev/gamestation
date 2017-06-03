<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class SupplierPresenter extends Presenter
{
    public function email()
    {
        return $this->model->email ? $this->model->email : '-';
    }

    public function telephone()
    {
        return $this->model->telephone ? $this->phoneFormater($this->model->telephone) : '-';
    }

    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }

    protected function phoneFormater($number)
    {
        if (strlen($number) < 10 || strlen($number) > 10) {
            return $number;
        }

        // Mexico 55
        // Monterrey 81
        // Guadalajara 33
        $ladaTwoDigits = [55, 81, 33];
        $lada = substr($number, 0, 2);
        if (!in_array($lada, $ladaTwoDigits)) {
            $lada = substr($number, 0, 3);
        }
        $phone = substr($number, strlen($lada));
        $phone = substr_replace($phone, '-', -4, 0);

        return "({$lada}) {$phone}";
    }
}