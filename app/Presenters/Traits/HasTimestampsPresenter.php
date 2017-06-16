<?php

namespace App\Presenters\Traits;

trait HasTimestampsPresenter
{
    public function createdAt()
    {
        return $this->model->created_at->format('d.m.Y');
    }

    public function updatedAt()
    {
        return $this->model->updated_at->format('d.m.Y');
    }
}