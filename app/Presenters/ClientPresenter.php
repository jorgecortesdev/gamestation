<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class ClientPresenter extends Presenter
{
    use Traits\HasTimestampsPresenter,
        Traits\HasContactInformationPresenter;
}