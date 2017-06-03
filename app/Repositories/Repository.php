<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /** @var \Illuminate\Database\Eloquent\Model */
    protected $model = null;

    /** @var array */
    protected $tasks = ['before' => [], 'after' => []];

    /**
     * Constructor
     */
    function __construct()
    {
        if ( ! class_exists($this->model)) {
            throw new \Exception(
                'Property $model was not set correctly in ' . get_class($this)
            );
        }

        $this->setModel(app()->make($this->model));
    }

    /**
     * Set an already fetched model.
     *
     * @param  Model Illuminate\Database\Eloquent\Model
     * @return null
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Returns latest eloquent model order by $id and paginated.
     *
     * @param  string  $orderBy
     * @param  integer $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function latest($limit = 20, $orderBy = 'id')
    {
        return $this->model->latest($orderBy)->paginate($limit);
    }

    /**
     * Delete model from database.
     *
     * @param  interger $id
     * @return bool|null
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete($id)
    {
        $entity = $this->model->findOrFail($id);
        return $entity->delete();
    }

    /**
     * Tasks to execute before save the model.
     *
     * @param $request Illuminate\Http\Request
     * @return null
     */
    protected function beforeSavingTasks(Request $request)
    {
        if (isset($this->tasks['before'])) {
            foreach ($this->tasks['before'] as $task) {
                (new $task($this->model))->handle($request);
            }
        }
    }

    /**
     * Tasks to execute after the model was save.
     *
     * @param $request Illuminate\Http\Request
     * @return null
     */
    protected function afterSavingTasks(Request $request)
    {
        if (isset($this->tasks['after'])) {
            foreach ($this->tasks['after'] as $task) {
                (new $task($this->model))->handle($request);
            }
        }
    }
}