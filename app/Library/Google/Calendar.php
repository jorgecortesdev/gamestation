<?php
namespace App\Library\Google;

class Calendar
{
    protected $calendar_id;

    protected $service;

    protected $colors;

    public function __construct($calendar_id, $key_file, $scopes = null)
    {
        $this->calendar_id = $calendar_id;

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $key_file);
        $client = new \Google_Client();
        $client->useApplicationDefaultCredentials();

        if ($scopes) {
            $client->setScopes($scopes);
        }

        $this->service = new \Google_Service_Calendar($client);
    }

    public function listEvents($start, $end)
    {
        $optParams = [
            'orderBy' => 'startTime',
            'singleEvents' => TRUE,
            'timeMin' => $start,
            'timeMax' => $end
        ];

        $rawEvents = $this->service->events->listEvents($this->calendar_id, $optParams);

        $data = [];

        foreach ($rawEvents->getItems() as $rawEvent) {
            $event['title'] = $rawEvent->getSummary();

            $dataStart = $rawEvent->start->dateTime;
            if (empty($dataStart)) {
                $dataStart = $rawEvent->start->date;
            }
            $event['start'] = $dataStart;

            $dataEnd = $rawEvent->end->dateTime;
            if (empty($dataEnd)) {
                $dataEnd = $rawEvent->end->date;
            }
            $event['end'] = $dataEnd;

            $color = $this->eventColor($rawEvent->getColorId());
            if ($color) {
                $event['backgroundColor'] = $color->background;
                $event['textColor'] = $color->foreground;
            }

            $data[] = $event;
            unset($event);
        }

        return $data;
    }

    public function createEvent($summary, $start, $end, $colorId)
    {
        $event = new \Google_Service_Calendar_Event(
            array(
                'summary' => $summary,
                'colorId' => $colorId,
                // 'location' => '800 Howard St., San Francisco, CA 94103',
                // 'description' => 'A chance to hear more about Google\'s developer products.',
                'start' => array(
                    'dateTime' => $start,
                    'timeZone' => 'America/Hermosillo',
                ),
                'end' => array(
                    'dateTime' => $end,
                    'timeZone' => 'America/Hermosillo',
                ),
                // 'recurrence' => array(
                //     'RRULE:FREQ=DAILY;COUNT=2'
                // ),
                // 'attendees' => array(
                //     array('email' => 'lpage@example.com'),
                //     array('email' => 'sbrin@example.com'),
                // ),
                // 'reminders' => array(
                //     'useDefault' => FALSE,
                //     'overrides' => array(
                //     array('method' => 'email', 'minutes' => 24 * 60),
                //     array('method' => 'popup', 'minutes' => 10),
                //     ),
                // ),
            )
        );

        return $this->service->events->insert($this->calendar_id, $event);
    }

    public function eventColor($colorId)
    {
        $this->eventColors();
        return isset($this->colors[$colorId]) ? $this->colors[$colorId] : null;
    }

    public function eventColors()
    {
        if (!$this->colors) {
            $this->colors = $this->service->colors->get()->getEvent();
        }

        return $this->colors;
    }
}