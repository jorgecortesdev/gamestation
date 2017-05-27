<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $fillable = ['amount', 'description', 'event_id', 'charge', 'quantity', 'billable_id', 'billable_type'];

    public function getAmountAttribute($amount)
    {
        return ($amount / 100) * $this->quantity;
    }

    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = $amount * 100;
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
