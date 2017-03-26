<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Kid extends Model
{
    use Presentable;

    protected $presenter = 'App\Presenters\KidPresenter';

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday_at'
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
