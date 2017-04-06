<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class PropertiesPresenter extends Presenter
{

    public function options()
    {
        $options = '-';

        if (!empty($this->model->options) > 0) {
            $options = implode(',', $this->model->options);
        }

        return $options;
    }
}
