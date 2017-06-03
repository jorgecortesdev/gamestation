<?php

namespace App\Library\Quantifiable;

use App\Library\Quantifiable\Type\EventExtras;
use App\Library\Quantifiable\Type\ProductTypeable;

class QuantifiableType
{
    /**
     * Build and instance of a QuantifiableType.
     *
     * @param  integer $entity_id
     * @param  string $entity_type
     * @return \App\Library\Quantifiable\Type\Quantifiable
     */
    static public function build($entity_id, $entity_type)
    {
        if ($entity_type == 'App\Event') {
            $quantifiable = new EventExtras($entity_id, $entity_type);
        } else {
            $quantifiable = new ProductTypeable($entity_id, $entity_type);
        }

        return $quantifiable;
    }
}
