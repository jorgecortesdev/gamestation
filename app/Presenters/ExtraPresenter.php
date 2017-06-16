<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;
use App\Presenters\Traits\HasTimestampsPresenter;
use App\Presenters\Traits\HasProductTypesPresenter;

class ExtraPresenter extends Presenter
{
    use HasProductTypesPresenter, HasTimestampsPresenter;
}