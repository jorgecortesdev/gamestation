<?php

namespace App\Repositories;

use App\Kid;

class Kids
{
    public function latest($paginate = 20)
    {
        return Kid::latest('id')->paginate($paginate);
    }

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

    public function delete($id)
    {
        $kid = Kid::findOrFail($id);
        $kid->delete();
    }
}