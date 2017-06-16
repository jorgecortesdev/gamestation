<?php

namespace App;

use GameStation\Traits\HasProductTypes;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Extra extends Model
{
    use Presentable, HasProductTypes;

    protected $fillable = ['name', 'price'];

    protected $presenter = 'App\Presenters\ExtraPresenter';

    /*****************
     * Relationships *
     *****************/

    public function configurations()
    {
        return $this->morphMany(Configuration::class, 'configurable');
    }

    public function configurables()
    {
        return $this->productTypes()->where('configurable', true);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class)->withPivot('quantity');
    }
}
