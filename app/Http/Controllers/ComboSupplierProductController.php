<?php

namespace App\Http\Controllers;

use App\Combo;
use Illuminate\Http\Request;

class ComboSupplierProductController extends Controller
{
    public function update(Request $request)
    {
        $data = [];

        foreach ($request->product_ids as $key => $product_id) {
            $data[$product_id] = ['quantity' => $request->quantity[$key]];
        }

        $combo = Combo::find($request->combo_id);
        $combo->products()->sync($data);

        return redirect(route('combo.show', ['combo' => $combo->id]));
    }
}
