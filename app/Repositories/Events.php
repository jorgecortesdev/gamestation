<?php

namespace App\Repositories;

use App\Event;
use Illuminate\Http\Request;
use App\Repositories\Events\Invoice\Event as Invoice;

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

    /**
     * Create or Update the model.
     *
     * @param  Illuminate\Http\Request $request
     * @param  \App\Event|null $event
     * @return null
     */
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

    /**
     * Prepare the invoice of the event
     * and return it.
     *
     * @return \App\Repositories\Events\Invoice\Event
     */
    public function invoice()
    {
        $invoice = (new Invoice)
            ->push($this->model->combo)
            ->push($this->model->extras);

        return $invoice;
    }

    /**
     * Return the configurations for the current event.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function configurations()
    {
        return \App\Configuration::with('productType', 'product')
            ->where('event_id', $this->model->id)
            ->get();
    }
}
