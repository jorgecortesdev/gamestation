<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class PropertiesPresenter extends Presenter
{
    use Traits\HasTimestampsPresenter;

    public function options()
    {
        $options = '-';

        if (!empty($this->model->options) > 0) {
            $options = implode(', ', $this->model->options);
        }

        return $options;
    }

    protected function value()
    {
        return $this->pivot->value
            ? $this->pivot->value
            : $this->renderBan;
    }

    protected function renderBan()
    {
        return '<i class="fa fa-ban text-danger"></i>';
    }
}
