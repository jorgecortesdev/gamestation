<?php

namespace App\Library\Quantifiable\Type;

use App\Extra;
use App\Configuration;

class EventExtras extends Quantifiable
{
    protected $itemClass = 'App\Library\Quantifiable\Item\QMEventExtra';

    /**
     * Return an array of already selected items.
     *
     * @return array
     */
    public function selectedItems()
    {
        if (empty($this->selectedItems)) {
            $type = $this->type;
            $entity = $type::with('extras.productTypes.product.unity')
                ->find($this->id);
            $this->selectedItems = $entity->extras;
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
            $selectedIds = $selectedItems->pluck('id');
            $this->availableItems = Extra::with(
                    'productTypes.product.unity'
                )
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
        $type = $this->type;
        $entity = $type::find($this->id);
        $items = collect($items)->pluck('selected', 'id');
        $deleted = $this->deletePreviousConfigurations($entity, $items);
        $items->transform(function ($item, $key) {
            return ['quantity' => $item];
        });
        $entity->extras()->sync($items);
        $entity->addExtrasConfigurations();
        return [
            'message' => 'done!',
            'deleted' => $deleted
        ];
    }

    /**
     * Reset all the configurations in order to allow new
     * configurations.
     *
     * @param  \Illuminate\Database\Eloquent\Model $entity
     * @param  \Illuminate\Support\Collection $selectedItems
     * @return integer
     */
    protected function deletePreviousConfigurations($entity, $selectedItems)
    {
        $extrasIds = $entity->configurations
            ->whereIn('configurable_id', $selectedItems->keys())
            ->where('configurable_type', 'App\Extra')
            ->pluck('id');
        $count = 0;
        if ($extrasIds->isNotEmpty()) {
            $count = Configuration::destroy($extrasIds->toArray());
        }
        return $count;
    }
}
