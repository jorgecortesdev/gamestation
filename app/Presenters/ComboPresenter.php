<?php
namespace App\Presenters;

use App\Repositories\Combos;
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
        return $this->currencyFormater(
            $this->model->contribution_margin
        ) . '&nbsp;&nbsp;' . $this->renderArrow();
    }

    public function utility()
    {
        return number_format($this->model->utility * 100, 2) . '%';
    }

    public function productTotal($productTypeId)
    {
        $combos = new Combos();
        $cost = $combos->calculateProductCost($this->model->id, $productTypeId);
        return $this->currencyFormater($cost);
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

    public function renderColor($aditional)
    {
        return sprintf(
            "<div class='combo-color %s combo-color-border combo-color-bg-%d'></div>",
            $aditional,
            $this->model->google_color_id
        );
    }
}
