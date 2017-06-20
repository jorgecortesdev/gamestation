<?php
namespace App\Presenters;

use Carbon\Carbon;
use Laracodes\Presenter\Presenter;

class EventPresenter extends Presenter
{
    use Traits\HasTimestampsPresenter;

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

        $date = $this->model->occurs_on->formatLocalized('%a %d/%B/%Y');
        $date = str_replace($month, ucfirst($month), $date);
        $date = str_replace($day, ucfirst($day), $date);

        return $date;
    }

    public function occursOn()
    {
        if (old('occurs_on')) {
            return old('occurs_on');
        }

        return $this->model->occurs_on
            ? $this->model->occurs_on->format('F j, Y h:i A')
            : Carbon::now()->format('F j, Y h:i A');
    }
}
