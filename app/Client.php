<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Client extends Model
{
    use Presentable;

    protected $fillable = ['name', 'address', 'telephone', 'email'];

    protected $presenter = 'App\Presenters\ClientPresenter';

    public function kids()
    {
        return $this->belongsToMany(Kid::class);
    }
}
