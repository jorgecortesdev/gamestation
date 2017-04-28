<?php

namespace App\Repositories;

use App\Event;

class Events
{
    public function latest($paginate = 20)
    {
        return Event::latest('id')->paginate($paginate);
    }

    public function save(array $data, Event $event = null)
    {
        $client = $this->buildClient($data);
        $kid    = $this->buildKid($data);

        $client->kids()->sync([$kid->id]);
        $client->save();

        if (!$event) {
            $event = new Event();
        }

        $combo = \App\Combo::findOrFail($data['combo_id']);

        $event->occurs_on = \DateTime::createFromFormat('F j, Y H:i A', $data['eventDate']);

        $event->combo()->associate($combo);
        $event->client()->associate($client);
        $event->kid()->associate($kid);

        $event->save();

        // TODO: Sync with google calendar

        return $event;
    }

    public function getConfigurableProductsList()
    {
        return \App\ProductType::with('supplierProducts.supplier.products')
            ->where('configurable', true)
            ->whereNotNull('supplier_product_id')
            ->get()
            ->map(function ($productType) {
                $activeProduct = $productType->supplierProduct;
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

    public function getPropertiesList()
    {
        $properties = \App\Property::all();
        return $properties;
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
    }

    protected function buildClient(array $data)
    {
        if (ctype_digit($data['clientIdOrName'])) {
            $client = \App\Client::findOrFail($data['clientIdOrName']);
        } else {
            $client = new \App\Client();
            $client->name = $data['clientIdOrName'];
        }

        $client->address   = $data['clientAddress'];
        $client->telephone = $data['clientTelephone'];
        $client->email     = $data['clientEmail'];

        $client->save();

        return $client;
    }

    protected function buildKid(array $data)
    {
        if (ctype_digit($data['kidId'])) {
            $kid = \App\Kid::findOrFail($data['kidId']);
        } else {
            $kid = new \App\Kid();
        }

        $kid->name        = $data['kidName'];
        $kid->birthday_at = \DateTime::createFromFormat('F j, Y', $data['kidBirthday']);
        $kid->sex         = $data['kidGender'];

        $kid->save();

        return $kid;
    }
}