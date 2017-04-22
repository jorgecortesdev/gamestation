<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Event extends Model
{
    use Presentable;

    protected $presenter = 'App\Presenters\EventPresenter';

    protected $fillable = ['ocurrs_on', 'combo_id', 'client_id', 'kid_id'];

    protected $dates = ['created_at', 'updated_at', 'occurs_on'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function kid()
    {
        return $this->belongsTo(Kid::class);
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }
}
