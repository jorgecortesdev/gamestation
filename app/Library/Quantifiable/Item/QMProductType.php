<?php

namespace App\Library\Quantifiable\Item;

class QMProductType extends QMItem
{
    /**
     * @return integer
     */
    public function getId()
    {
        return $this->entity->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->entity->name;
    }

    /**
     * @return integer
     */
    public function getQuantity()
    {
        return $this->entity->quantity;
    }

    /**
     * @return string
     */
    public function getUnity()
    {
        return $this->entity->activeProduct->unity->name;
    }

    /**
     * @return integer
     */
    public function getSelected()
    {
        return $this->entity->pivot ? $this->entity->pivot->quantity : 1;
    }
}
