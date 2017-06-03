<?php

return [
    'calendar' => [
        'id' => env('GOOGLE_CALENDAR_ID'),
        'key_file' => base_path() . '/gscalendar.json',
        'scopes' => [
            'https://www.googleapis.com/auth/calendar',
            'https://www.googleapis.com/auth/calendar.readonly'
        ],
    ],
];