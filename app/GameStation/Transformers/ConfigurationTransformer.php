<?php

namespace GameStation\Transformers;

use App\Configuration;
use Illuminate\Database\Eloquent\Model;

class ConfigurationTransformer extends Transformer
{
    public function transform(Model $configuration)
    {
        $data = [
            'configuration_id' => $configuration->id,
            'event_id' => $configuration->event_id,
            'product_type' => $configuration->productType->name,
            'type' => $configuration->type(),
        ];

        $data = array_merge($data, $this->extratProductName($configuration));

        return $data;
    }

    protected function extratProductName(Configuration $configuration)
    {
        $product = [];

        if ($configuration->product_id == null && $configuration->custom == null) {
            return $product = [
                'configured' => false,
                'product' => null,
            ];
        }

        if ($configuration->custom !== null) {
            return $product = [
                'configured' => true,
                'product' => $configuration->custom,
            ];
        }

        if ($configuration->product_id) {
            return $product = [
                'configured' => true,
                'product' => $configuration->product->name,
            ];
        }
    }
}
