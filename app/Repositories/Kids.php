<?php

namespace App\Repositories;

use App\Kid;

class Kids extends Repository
{
    protected $model = Kid::class;

    public function save(array $data, Kid $kid = null)
    {
        $birthday_at = \DateTime::createFromFormat('F j, Y',$data['birthday_at']);

        $client =\App\Client::findOrFail($data['client_id']);

        if (!$kid) {
            $kid = new Kid();
        }

        $kid->name        = $data['name'];
        $kid->sex         = $data['sex'];
        $kid->birthday_at = $birthday_at;

        $kid->save();

        $kid->clients()->sync([$client->id]);
    }
}
