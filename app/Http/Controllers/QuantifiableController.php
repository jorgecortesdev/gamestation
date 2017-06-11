<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Quantifiable\QuantifiableType;

class QuantifiableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Used by QuantifiableManager.vue to list the
     * available and current items.
     *
     * @param  integer $entity_id
     * @param  string $entity_type
     * @return json
     */
    public function show($entity, $type)
    {
        $quantifiable = QuantifiableType::build($entity, $type);
        return $quantifiable->items();
    }

    /**
     * Used by QuantifiableManager.vue to update the
     * entity items.
     *
     * @param  Request $request
     * @param  integer  $entity_id
     * @param  string  $entity_type
     * @return json
     */
    public function update(Request $request, $entity, $type)
    {
        $quantifiable = QuantifiableType::build($entity, $type);
        return $quantifiable->save($request->get('items'));
    }
}
