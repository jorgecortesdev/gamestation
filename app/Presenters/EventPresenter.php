<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class EventPresenter extends Presenter
{
    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }

    public function occursOn()
    {
        $month = $this->model->occurs_on->formatLocalized('%B');
        $day = $this->model->occurs_on->formatLocalized('%A');

        $date = $this->model->occurs_on->formatLocalized('%A %d de %B de %Y %H:%M');
        $date = str_replace($month, ucfirst($month), $date);
        $date = str_replace($day, ucfirst($day), $date);

        return $date;
    }
}