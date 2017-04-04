<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class KidPresenter extends Presenter
{
    public function birthdayAt()
    {
        return $this->model->birthday_at->formatLocalized('%A %d de %B de %Y');
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

    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }
}