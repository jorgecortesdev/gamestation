<?php

namespace App\Repositories;

use App\Event;
use Illuminate\Http\Request;

class Events extends Repository
{
    protected $model = Event::class;

    protected $tasks = [
        'before' => [
            Tasks\Events\BuildEvent::class,
            Tasks\Events\BuildCombo::class,
            Tasks\Events\BuildKid::class,
            Tasks\Events\BuildClient::class,
        ],
        'after' => [
            Tasks\Events\BuildConfigurations::class
        ]
    ];

    public function save(Request $request, Event $event = null)
    {
        if ( ! is_null($event)) {
            $this->model = $event;
        }

        $this->beforeSavingTasks($request);

        $this->model->save();

        $this->afterSavingTasks($request);
    }

    /**
     * Search the model.
     *
     * @param  string|integer $query
     * @param  integer $limit
     * @return \Laravel\Scout\Builder
     */
    public function search($query, $limit = 20)
    {
        return $this->model->search($query)->paginate($limit);
    }

    public function getConfigurableProductsList()
    {
        return \App\ProductType::with('products.supplier.products')
            ->where('configurable', true)
            ->whereNotNull('product_id')
            ->get()
            ->map(function ($productType) {
                $activeProduct = $productType->product;
                $availableProducts = $activeProduct->supplier->products->filter(function ($product) use ($activeProduct) {
                    return $product->id !== $activeProduct->id;
                })->pluck('name', 'id')->toArray();
                return [
                    'product_type' => $productType->name,
                    'products' => $availableProducts,
                    'customizable' => $productType->customizable,
                    'render' => strtolower($productType->renderType->name),
                ];
            });
    }
}
