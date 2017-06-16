<?php

namespace GameStation\Traits;

use DB;
use Cache;
use App\ProductType;

trait HasProductTypes
{
    protected static function bootHasProductTypes()
    {
        static::deleted(function ($model) {
            $model->deleteRelationshipRecords();
        });
    }

    public function getContributionMarginAttribute()
    {
        return $this->price - $this->variableCost;
    }

    public function getUtilityAttribute()
    {
        return $this->price / $this->contributionMargin;
    }

    public function getVariableCostAttribute()
    {
        // $productTypes = Cache::remember($this->cacheKey(), 60 * 1, function () {
        //     return $this->productTypes;
        // });

        return $this->productTypes->sum(function ($productType) {
            return $productType->activeProduct->unitPrice * $productType->pivot->quantity;
        });
    }

    public function productTypes()
    {
        return $this->morphToMany(ProductType::class, 'entity', 'product_typeables')
            ->withPivot('quantity')
            ->with('activeProduct');
    }

    public function addProductType(ProductType $productType, $quantity = 1)
    {
        return $this->addProductTypes([$productType->id => $quantity]);
    }

    public function addProductTypes(array $data)
    {
        $data = collect($data);

        $this->verifyProductTypesHaveActiveProducts($data->keys()->toArray());

        $data->transform(function ($item, $key) {
            return ['quantity' => $item];
        });

        $this->productTypes()->sync($data);

        return $this;
    }

    protected function verifyProductTypesHaveActiveProducts(array $ids)
    {
        ProductType::whereIn('product_types.id', $ids)
            ->each(function ($productType) {
                if ( ! $productType->hasActiveProduct()) {
                    throw new \Exception(
                        'No se puede asignar un tipo de producto que no tenga producto activo.'
                    );
                }
            });
    }

    protected function deleteRelationshipRecords()
    {
        DB::table('product_typeables')
            ->where(['entity_id' => $this->id])
            ->delete();

        return $this;
    }

    protected function cacheKey()
    {
        return "{$this->getEntityType()}-{$this->id}-product-types";
    }

    protected function getEntityType()
    {
        return strtolower(
            (new \ReflectionClass($this))->getShortName()
        );
    }
}