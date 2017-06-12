<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Event extends Model
{
    use Presentable, Searchable;

    protected $presenter = 'App\Presenters\EventPresenter';

    protected $fillable = ['occurs_on', 'combo_id', 'client_id', 'kid_id'];

    protected $dates = ['created_at', 'updated_at', 'occurs_on'];

    public function path()
    {
        return route('events.show', [$this->id]);
    }

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

    public function extras()
    {
        return $this->belongsToMany(Extra::class)->withPivot('quantity');
    }

    public function configurations()
    {
        return $this->hasMany(Configuration::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)->withPivot('value');
    }

    public function statements()
    {
        return $this->hasMany(Statement::class);
    }

    public function addExtrasConfigurations()
    {
        foreach ($this->extras as $extra) {
            $quantity = $extra->pivot->quantity;
            for ($i = 1; $i <= $quantity; $i++) {
                $this->createConfigurations($extra);
            }
        }
    }

    public function addComboConfigurations()
    {
        $this->createConfigurations($this->combo);
    }

    private function createConfigurations($entity)
    {
        foreach ($entity->configurables as $configurable) {
            $quantity = $configurable->pivot->quantity;
            for ($i = 1; $i <= $quantity; $i++) {
                $entity->configurations()->create([
                    'event_id' => $this->id,
                    'product_type_id' => $configurable->pivot->product_type_id
                ]);
            }
        }
    }

    public function chargeCombo()
    {
        $statement = $this->statements()->firstOrCreate([
            'billable_id' => $this->combo->id,
            'billable_type' => get_class($this->combo)
        ]);
        $statement->amount = $this->combo->price;
        $statement->description = 'Paquete ' . $this->combo->name;
        $statement->charge = true;
        $statement->quantity = 1;
        $statement->save();
    }

    public function chargeExtras()
    {
        $this->statements()->where('billable_type', 'App\Extra')->delete();
        $statements = collect();
        $this->extras->each(function ($extra) use ($statements) {
            $statements->push(new \App\Statement([
                'amount' => $extra->price,
                'description' => $extra->name,
                'charge' => true,
                'quantity' => $extra->pivot->quantity,
                'billable_id' => $extra->id,
                'billable_type' => get_class($extra)
            ]));
        });
        $this->statements()->saveMany($statements);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'id'          => $this->id,
            'occurs_on'   => $this->occurs_on,
            'client_name' => $this->client->name,
            'kid_name'    => $this->kid->name,
            'combo_name'  => $this->combo->name,
        ];
    }

    public function getFormValue($name)
    {
        if (empty($name)) {
            return null;
        }

        switch ($name) {
            case 'occurs_on':
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
