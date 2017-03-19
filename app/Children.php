<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
