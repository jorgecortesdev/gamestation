<?php

namespace App\Repositories;

use App\Combo;

class Combos
{
    public function latest($paginate = 20)
    {
        return Combo::latest('id')->paginate($paginate);
    }

    public function calculateProductCost($comboId, $productTypeId)
    {
        $combo = Combo::find($comboId);
        $product = $combo->productTypes()
            ->with('supplierProduct')
            ->where('product_types.id', $productTypeId)
            ->first();

        return $product->supplierProduct->unit_cost * $product->pivot->quantity;
    }

    public function delete($id)
    {
        $combo = Combo::findOrFail($id);
        $combo->delete();
    }
}
