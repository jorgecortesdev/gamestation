<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Client extends Model
{
    use Presentable;

    protected $presenter = 'App\Presenters\ClientPresenter';

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function kids()
    {
        return $this->belongsToMany(Kid::class);
    }

    public function scopeLike($query, $field, $value)
    {
        return $query->where($field, 'LIKE', "%$value%");
    }
}
