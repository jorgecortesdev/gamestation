<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function childrens()
    {
        return $this->belongsToMany(Client::class);
    }
}
