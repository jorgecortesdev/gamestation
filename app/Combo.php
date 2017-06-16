<?php

namespace App;

use GameStation\Traits\HasProductTypes;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Combo extends Model
{
    use Presentable, HasProductTypes;

    protected $fillable = ['name', 'hours', 'kids', 'adults', 'price', 'color_id'];

    protected $presenter = 'App\Presenters\ComboPresenter';

    public function configurableProductTypes()
    {
        return $this->productTypes()->where('configurable', true);
    }

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

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /***************
     * Form Values *
     ***************/

    public function getFormValue($name)
    {
        if (empty($name)) {
            return null;
        }

        switch ($name) {
            case 'properties':
                return $this->properties->pluck('id')->toArray();
                break;
        }

        return $this->getAttribute($name);
    }
}
