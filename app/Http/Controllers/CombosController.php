<?php

namespace App\Http\Controllers;

use App\Combo;
use Validator;
use App\Repositories\Combos;
use Illuminate\Http\Request;

class CombosController extends Controller
{
    /** @var Combos Combo repository */
    protected $combos;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Combos $combos)
    {
        $this->middleware('auth');

        $this->combos = $combos;
    }

    public function index()
    {
        $combos = $this->combos->latest();
        return view('combos.index', compact('combos'));
    }

    public function show(Combo $combo)
    {
        return view('combos.show', compact('combo'));
    }

    public function create()
    {
        return view('combos.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $combo = new Combo();
        $combo->name = $request->name;
        $combo->hours = $request->hours;
        $combo->kids = $request->kids;
        $combo->adults = $request->adults;
        $combo->price = $request->price;
        if (!empty($request->google_color_id)) {
            $combo->google_color_id = $request->google_color_id;
        }

        $combo->save();

        if (empty($request->properties)) {
            $combo->properties()->detach();
        } else {
            $combo->properties()->sync($request->properties);
        }

        flash('Paquete agregado con éxito', 'success');

        return redirect(route('combo.index'));
    }

    public function edit(Combo $combo)
    {
        return view('combos.edit', compact('combo'));
    }

   public function update(Request $request, Combo $combo)
    {
        $data = array_merge($request->all(), ['id' => $combo->id]);

        $validator = $this->validator($data);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $combo->update($request->all());

        if (empty($request->properties)) {
            $combo->properties()->detach();
        } else {
            $combo->properties()->sync($request->properties);
        }

        flash('Paquete actualizado con éxito', 'success');

        return redirect(route('combo.index'));
    }

    public function destroy($id)
    {
        $this->combos->delete($id);

        flash('Paquete borrado con éxito', 'success');

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|unique:combos|min:3',
            'hours' => 'required|numeric',
            'kids' => 'required|numeric',
            'adults' => 'required|numeric',
            'price' => 'required|numeric',
            'google_color_id' => 'required|digits_between:1,11'
        ];

        if (isset($data['id'])) {
            $rules['name'] = 'required|min:3|unique:combos,id,' . $data['id'];
        }

        $messages = [
            'name.required' => 'El campo es requerido.',
        ];

        return Validator::make($data, $rules, $messages);
    }

    public function getConfigurableProducts(Request $request)
    {
        $combo = Combo::with(['productTypes' => function($query) {
                $query->where('configurable', true);
                $query->whereNotNull('supplier_product_id');
            }])
            ->find($request->combo_id);

        $products = $combo->productTypes->map(function ($productType) {
            $activeProductId = $productType->supplier_product_id;
            $availableProducts = $productType->supplierProduct->supplier->products->filter(function ($product) use ($activeProductId) {
                return $product->id != $activeProductId;
            })->pluck('name', 'id')->toArray();
            return collect([
                'label'        => $productType->name,
                'products'     => $availableProducts,
                'customizable' => $productType->customizable,
                'render'       => strtolower($productType->renderType->name),
                'quantity'     => $productType->pivot->quantity,
            ]);
        });

        $collectionToReturn = collect();

        $products->each(function ($product) use ($collectionToReturn) {
            if ($product['render'] == 'radio' && $product['quantity'] > 1) {
                for ($i = 1; $i <= $product['quantity']; $i++) {
                    $productToAdd = clone $product;
                    $productToAdd['label'] = trim($product['label'], 's') . ' ' . $i;
                    $productToAdd['quantity'] = 1;
                    $collectionToReturn->push($productToAdd);
                }

                return;
            }

            $collectionToReturn->push($product);
        });

        return ['configurables' => $collectionToReturn->toArray()];
    }

    public function getProperties(Request $request)
    {
        $combo = Combo::with('properties')->find($request->combo_id);

        $properties = $combo->properties->map(function ($property) {
            return [
                'label' => $property->label,
                'render' => strtolower($property->renderType->name),
                'options' => $property->options
            ];
        });

        return ['properties' => $properties];
    }
}
