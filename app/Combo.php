<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Combo extends Model
{
    use Presentable;

    protected $fillable = ['name', 'price', 'google_color_id'];

    protected $presenter = 'App\Presenters\ComboPresenter';

    public function items()
    {
        return $this->hasMany(ComboItem::class)->with(['product']);
    }

    public function getTotalAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->product->unit_cost * $item->quantity;
        });
    }

    public function getContributionMarginAttribute()
    {
        return $this->price - $this->total;
    }

    public function getUtilityAttribute()
    {
        return $this->price / $this->contribution_margin;
    }
}
