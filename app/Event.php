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

    public function getFormValue($name)
    {
        if (empty($name)) {
            return null;
        }

        switch ($name) {
            case 'eventDate':
                return $this->occurs_on->format('F j, Y H:i A');
                break;
            case 'clientIdOrName':
                return $this->client->id;
                break;
            case 'clientAddress':
                return $this->client->address;
                break;
            case 'clientTelephone':
                return $this->client->telephone;
                break;
            case 'clientEmail':
                return $this->client->email;
                break;
            case 'kidId':
                return $this->kid->id;
                break;
            case 'kidName':
                return $this->kid->name;
                break;
            case 'kidBirthday':
                return $this->kid->birthday_at->format('M j, Y');
                break;
            case 'kidGender':
                return $this->kid->sex;
                break;
        }

        return $this->getAttribute($name);
    }
}
