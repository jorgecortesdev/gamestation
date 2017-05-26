<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $fillable = ['amount', 'description', 'event_id', 'charge', 'quantity'];

    public function getAmountAttribute($amount)
    {
        return ($amount / 100) * $this->quantity;
    }

    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = $amount * 100;
    }
}
