<?php

namespace App\Repositories;

use App\Combo;

class Combos extends Repository
{
    protected $model = Combo::class;

    public function calculateProductCost($comboId, $productTypeId)
    {
        $combo = Combo::find($comboId);
        $product = $combo->productTypes()
            ->with('product')
            ->where('product_types.id', $productTypeId)
            ->first();

        return $product->product->unit_cost * $product->pivot->quantity;
    }
}
