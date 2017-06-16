<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class KidPresenter extends Presenter
{
    use Traits\HasTimestampsPresenter;

    public function birthdayAt()
    {
        return $this->model->birthday_at->formatLocalized('%d/%B/%Y');
    }

    public function sex()
    {
        return $this->model->sex === 1 ? 'Hombre' : 'Mujer';
    }

    public function parents()
    {
        $parents = '';

        foreach ($this->model->clients as $client) {
            $parents .= $client->name . ' --- ';
        }

        return trim($parents, ' --- ');
    }
}