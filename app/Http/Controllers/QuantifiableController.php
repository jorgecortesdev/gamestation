<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Quantifiable\QuantifiableType;

class QuantifiableController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
    public function index($entity_id, $entity_type)
    {
        $quantifiable = QuantifiableType::build($entity_id, $entity_type);
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
    public function update(Request $request, $entity_id, $entity_type)
    {
        $quantifiable = QuantifiableType::build($entity_id, $entity_type);
        return $quantifiable->save($request->get('items'));
    }
}
