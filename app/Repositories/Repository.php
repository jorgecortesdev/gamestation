<?php

namespace App\Repositories;

abstract class Repository
{
    /** @var \Illuminate\Database\Eloquent\Model */
    protected $model = null;

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

        $this->model = app()->make($this->model);
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
}