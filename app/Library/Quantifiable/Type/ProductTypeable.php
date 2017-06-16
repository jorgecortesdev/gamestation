<?php

namespace App\Library\Quantifiable\Type;

use App\ProductType;

class ProductTypeable extends Quantifiable
{
    /** @var string */
    protected $itemClass = 'App\Library\Quantifiable\Item\QMProductType';

    /**
     * Return an array of already selected items.
     *
     * @return array
     */
    public function selectedItems()
    {
        if (empty($this->selectedItems)) {
            $type = $this->type;
            $entity = $type::with('productTypes.activeProduct.unity')
                ->find($this->id);
            $this->selectedItems = $entity->productTypes;
        }
        return $this->selectedItems;
    }

    /**
     * Return an array of items available for
     * selection.
     *
     * @return array
     */
    public function availableItems()
    {
        if (empty($this->availableItems)) {
            $selectedItems = $this->selectedItems();
            $selectedIds = $selectedItems->pluck('pivot.product_type_id');
            $this->availableItems = ProductType::with(
                    'activeProduct.unity'
                )
                ->has('activeProduct')
                ->whereNotIn('id', $selectedIds)
                ->get();
        }
        return $this->availableItems;
    }

    /**
     * Sync the selected items in the database.
     *
     * @param  array  $items
     * @return array
     */
    public function save(array $items)
    {
        $items = collect($items)
            ->pluck('selected', 'id')
            ->toArray();

        $type = $this->type;
        $entity = $type::find($this->id);
        $entity->addProductTypes($items);
    }
}
