<?php
namespace App\Presenters;

use Laracodes\Presenter\Presenter;

class SupplierPresenter extends Presenter
{
    use Traits\HasTimestampsPresenter,
        Traits\HasContactInformationPresenter;
}