<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class ExtraPresenter extends Presenter
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
        return $this->currencyFormater(
            $this->model->contribution_margin
        ) . '&nbsp;&nbsp;' . $this->renderArrow();
    }

    protected function currencyFormater($amount)
    {
        return money_format('%.2n', $amount);
    }

    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }

    protected function renderArrow()
    {
        $arrow = '';

        switch (true) {
            case $this->total() < $this->model->contribution_margin:
                $arrow = '<i class="fa fa-arrow-up text-success" aria-hidden="true"></i>';
                break;
            case $this->total() >= $this->model->contribution_margin:
                $arrow = '<i class="fa fa-arrow-down text-danger" aria-hidden="true"></i>';
                break;
            default:
                $arrow = '';
                break;
        }

        return $arrow;
    }
}