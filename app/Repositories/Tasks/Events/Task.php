<?php

namespace App\Repositories\Tasks\Events;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class Task
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Handles the task.
     *
     * @param  Illuminate\Http\Request $request
     * @return void
     *
     * @throws TaskException
     */
    abstract public function handle(Request $request);
}
