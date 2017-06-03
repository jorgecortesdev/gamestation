<?php

namespace App\Repositories\Tasks\Events;

use DateTime;
use App\Kid;
use Illuminate\Http\Request;

class BuildKid extends Task
{
    /**
     * Handles the task.
     *
     * @param  Illuminate\Http\Request $request
     * @return void
     *
     * @throws TaskException
     */
    public function handle(Request $request)
    {
        $kid = $this->findOrNew($request->input('kidId'));

        $birthday_at = DateTime::createFromFormat(
            'F j, Y',
            $request->input('kidBirthday')
        );
        $kid->birthday_at = $birthday_at;

        $kid->name = $request->input('kidName');
        $kid->sex  = $request->input('kidGender');

        $kid->save();

        $this->model->kid()->associate($kid);
    }

    /**
     * Find or create a kid model.
     *
     * @param  integer $id
     * @return App\Kid
     */
    protected function findOrNew($id)
    {
        return ctype_digit($id)
            ? Kid::findOrFail($id)
            : new Kid;
    }
}
