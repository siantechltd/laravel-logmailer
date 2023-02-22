<?php

return [
    "from" => env('SIANTECH_LOGMAILER_FROM'),
    "to" => env('SIANTECH_LOGMAILER_TO'),
    "cc" => env('SIANTECH_LOGMAILER_CC'),
    "bcc" => env('SIANTECH_LOGMAILER_BCC'),
    "subject" => env('SIANTECH_LOGMAILER_SUBJECT', "Hourly Logs Email"),

    "delete_after_send" => true
];
