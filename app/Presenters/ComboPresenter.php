<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class ComboPresenter extends Presenter
{
    public function price()
    {
        return $this->currencyFormater($this->model->price);
    }

    public function total()
    {
        return $this->currencyFormater($this->model->total);
    }

    public function contributionMargin()
    {
        return $this->currencyFormater($this->model->contribution_margin);
    }

    public function utility()
    {
        return number_format($this->model->utility * 100, 2) . '%';
    }

    protected function currencyFormater($amount)
    {
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        return money_format('%.2n', $amount);
    }
}