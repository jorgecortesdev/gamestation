<?php

namespace App\GameStation\Calendar;

use Carbon\Carbon;

class GoogleCalendar implements Calendar
{
    protected $calendar_id;

    protected $service;

    protected $colors;

    public function __construct($calendar_id, $key_file, $scopes, $colors)
    {
        $this->calendar_id = $calendar_id;

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $key_file);
        $client = new \Google_Client();
        $client->useApplicationDefaultCredentials();

        $client->setScopes($scopes);

        $this->service = new \Google_Service_Calendar($client);

        $this->colors = collect($colors);
    }

    public function between($start, $end)
    {
        $start = Carbon::createFromFormat('Y-m-d', $start)->toRfc3339String();
        $end = Carbon::createFromFormat('Y-m-d', $end)->toRfc3339String();

        $optParams = [
            'orderBy' => 'startTime',
            'singleEvents' => TRUE,
            'timeMin' => $start,
            'timeMax' => $end
        ];

        $events = $this->service->events->listEvents($this->calendar_id, $optParams)->getItems();

        return collect($events)->map(function ($rawEvent) {
            $event['id'] = $rawEvent->id;
            $event['title'] = $rawEvent->summary;
            $event['start'] = $rawEvent->start->dateTime;
            $event['end'] = $rawEvent->end->dateTime;

            $color = $this->color($rawEvent->colorId);

            $event['backgroundColor'] = $color['background'];
            $event['textColor'] = $color['foreground'];

            return $event;
        })->toArray();
    }

    public function createEvent($summary, $start, $end, $colorId)
    {
        $event = new \Google_Service_Calendar_Event(
            array(
                'summary' => $summary,
                'colorId' => $colorId,
                'start' => array(
                    'dateTime' => $start,
                    'timeZone' => 'America/Hermosillo',
                ),
                'end' => array(
                    'dateTime' => $end,
                    'timeZone' => 'America/Hermosillo',
                )
            )
        );

        return $this->service->events->insert($this->calendar_id, $event);
    }

    public function color($colorId)
    {
        return $this->colors->get($colorId);
    }

    public function colors()
    {
        return $this->colors;
    }

    /**
     * Verifica disponibilidad, el formato de fecha es el siguiente:
     *
     * $start = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2017-04-21 18:00:00', 'America/Hermosillo')->toIso8601String();
     *
     * @return boolean
     */
    public function verify($start, $hours = 3)
    {
        $start = Carbon::parse($start);
        $end = $start->copy()->addHours($hours);

        $start = $start->toIso8601String();
        $end = $end->toIso8601String();

        $item = new \Google_Service_Calendar_FreeBusyRequestItem();
        $item->setId($this->calendar_id);

        $request = new \Google_Service_Calendar_FreeBusyRequest();
        $request->setTimeMin($start);
        $request->setTimeMax($end);
        $request->setTimeZone('America/Hermosillo');
        $request->setItems([$item]);

        $response = $this->service->freebusy->query($request);

        $calendars = $response->getCalendars();

        if (! isset($calendars[$this->calendar_id])) {
            throw new Exception('Calendar not found!');
        }

        return collect($calendars[$this->calendar_id]->getBusy())
            ->reduce(function ($carry, $timePeriod) use ($start, $end) {
                $busyStart = Carbon::parse($timePeriod->getStart());
                $busyEnd = Carbon::parse($timePeriod->getEnd());
                return $busyStart->gte(Carbon::parse($start)) && $busyEnd->lte(Carbon::parse($end));
        }, false);
    }

    public function editEvent($eventId)
    {
        // @TODO
    }

    public function deleteEvent($eventId)
    {
        // @TODO
    }
}