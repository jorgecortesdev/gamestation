<?php

namespace App\Library\Quantifiable\Item;

use Illuminate\Database\Eloquent\Model;

abstract class QMItem
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $entity;

    /**
     * @param \Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(Model $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return integer
     */
    abstract public function getId();

    /**
     * @return string
     */
    abstract public function getName();

    /**
     * @return integer
     */
    abstract public function getQuantity();

    /**
     * @return string
     */
    abstract public function getUnity();

    /**
     * @return integer
     */
    abstract public function getSelected();

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function toJson()
    {
        $json = json_encode($this->toArray());

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \Exception(json_last_error_msg());
        }

        return $json;
    }

    /**
     * @return array
     */
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'unity' => $this->unity,
            'selected' => $this->selected
        ];
    }

    /**
     * @param $property
     * @return bool
     */
    public function __isset($property)
    {
        return method_exists($this, camel_case($property));
    }

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        $camel_property = camel_case('get_' . $property);

        if (method_exists($this, $camel_property)) {
            return $this->{$camel_property}();
        }

        return $this->entity->{snake_case($property)};
    }
}
