<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class EventPresenter extends Presenter
{
    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }

    public function dayNameWhenOccurs()
    {
        return ucwords(
            $this->model->occurs_on->formatLocalized('%A')
        );
    }

    public function dayWhenOccurs()
    {
        return ucwords(
            $this->model->occurs_on->format('d')
        );
    }

    public function monthNameWhenOccurs()
    {
        return ucwords(
            $this->model->occurs_on->formatLocalized('%B')
        );
    }

    public function monthAndDayWhenOccurs()
    {
        return $this->monthNameWhenOccurs() . ' ' . $this->dayWhenOccurs();
    }

    public function yearWhenOccurs()
    {
        return $this->model->occurs_on->format('Y');
    }

    public function timeWhenOccurs()
    {
        return $this->model->occurs_on->format('h:i A')
            . ' - '
            . $this->model->occurs_on->addHour(3)->format('h:i A');
    }

    public function dateWhenOccurs()
    {
        $month = $this->model->occurs_on->formatLocalized('%B');
        $day = $this->model->occurs_on->formatLocalized('%a');

        $date = $this->model->occurs_on->formatLocalized('%a %d de %B del %Y');
        $date = str_replace($month, ucfirst($month), $date);
        $date = str_replace($day, ucfirst($day), $date);

        return $date;
    }
}