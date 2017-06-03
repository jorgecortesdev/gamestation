<?php

namespace App\Library\Quantifiable\Type;

abstract class Quantifiable
{
    /**
     * Quantifiable type: 'App\Combo'
     * @var string
     */
    protected $type;

    /**
     * Quantifiable Id
     * @var integer
     */
    protected $id;

    /** @var \Illuminate\Database\Eloquent\Collection */
    protected $selectedItems;

    /** @var \Illuminate\Database\Eloquent\Collection */
    protected $availableItems;

    /**
     * @param integer $id
     * @param string $type
     */
    function __construct($id, $type)
    {
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * Return an array of already selected items.
     *
     * @return array
     */
    abstract public function selectedItems();

    /**
     * Return an array of items available for
     * selection.
     *
     * @return array
     */
    abstract public function availableItems();

    /**
     * Sync the selected items in the database.
     *
     * @param  array  $items
     * @return array
     */
    abstract public function save(array $items);

    /**
     * Return an array of items: available and selected.
     *
     * @return array
     */
    public function items()
    {
        $selectedItems = $this->selectedItems();
        $availableItems = $this->availableItems();

        return [
            'selected' => $this->buildArray($selectedItems),
            'available' => $this->buildArray($availableItems)
        ];
    }

    /**
     * Build an array of items.
     *
     * @param  \Illuminate\Database\Eloquent\Collection $items
     * @return array
     */
    protected function buildArray($items)
    {
        $array = [];
        foreach ($items as $item) {
            $array[] = $this->buildItem($item);
        }
        return $array;
    }

    /**
     * Transform an Eloquent Model to a Quantifiable Item and
     * convert it to an array.
     *
     * @param  \Illuminate\Database\Eloquent\Model $item
     * @return array
     */
    protected function buildItem($item)
    {
        if (property_exists($this, 'itemClass') && class_exists($this->itemClass)) {
            return (new $this->itemClass($item))->toArray();
        }

        throw new \Exception('Property $itemClass was not set correctly in ' . get_class($this));
    }
}
