<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Extra extends Model
{
    use Presentable;

    protected $fillable = ['name', 'price'];

    protected $presenter = 'App\Presenters\ExtraPresenter';
}
