<?php

namespace App\Library\Quantifiable\Item;

class QMEventExtra extends QMItem
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
        return 1;
    }

    /**
     * @return string
     */

    public function getUnity()
    {
    return 'Unidad';
    }

    /**
     * @return integer
     */
    public function getSelected()
    {
        return $this->entity->pivot ? $this->entity->pivot->quantity : 1;
    }
}
