<?php

namespace App\Presenters\Traits;

trait HasProductTypesPresenter
{
    public function price()
    {
        return $this->currencyFormater($this->model->price);
    }

    public function variableCost()
    {
        return $this->currencyFormater($this->model->variableCost);
    }

    public function contributionMargin()
    {
        return $this->currencyFormater(
            $this->model->contributionMargin
        ) . '&nbsp;&nbsp;' . $this->renderArrow();
    }

    public function utility()
    {
        return number_format($this->model->utility * 100, 2) . '%';
    }

    protected function currencyFormater($amount)
    {
        return money_format('%.2n', $amount);
    }

    protected function renderArrow()
    {
        $arrow = '';

        switch (true) {
            case $this->variableCost() < $this->model->contributionMargin:
                $arrow = '<i class="fa fa-arrow-up text-success"></i>';
                break;
            case $this->variableCost() >= $this->model->contributionMargin:
                $arrow = '<i class="fa fa-arrow-down text-danger"></i>';
                break;
        }

        return $arrow;
    }
}