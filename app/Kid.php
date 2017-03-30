<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Kid extends Model
{
    use Presentable;

    protected $fillable = ['name', 'sex', 'birthday_at'];

    protected $presenter = 'App\Presenters\KidPresenter';

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday_at'
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    public function getFormValue($name)
    {
        if (empty($name)) {
            return null;
        }

        switch ($name) {
            case 'birthday_at':
                return $this->birthday_at->format('M j, Y');
                break;
            case 'client_id':
                return $this->clients()->first()->id;
                break;
        }

        return $this->getAttribute($name);
    }
}
