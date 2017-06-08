<?php

namespace GameStation\Transformers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class Transformer
{
    public function transformCollection(Collection $items)
    {
        return $items->map(function ($item, $key) {
            return $this->transform($item);
        });
    }

    public abstract function transform(Model $item);
}

