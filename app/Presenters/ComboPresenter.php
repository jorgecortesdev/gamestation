<?php

namespace App\Presenters;

use App\Repositories\Combos;
use Laracodes\Presenter\Presenter;
use App\Presenters\Traits\HasTimestampsPresenter;
use App\Presenters\Traits\HasProductTypesPresenter;

class ComboPresenter extends Presenter
{
    use HasProductTypesPresenter, HasTimestampsPresenter;

    public function productTotal($productTypeId)
    {
        $combos = new Combos();
        $cost = $combos->calculateProductCost($this->model->id, $productTypeId);
        return $this->currencyFormater($cost);
    }

    public function renderColor($aditional)
    {
        return sprintf(
            "<div class='combo-color %s combo-color-border combo-color-bg-%d'></div>",
            $aditional,
            $this->model->color_id
        );
    }
}
