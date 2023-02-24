<?php

return [
    "from" => env('SIANTECH_LOGMAILER_FROM', env('MAIL_FROM_ADDRESS')),
    "to" => env('SIANTECH_LOGMAILER_TO'),
    "cc" => env('SIANTECH_LOGMAILER_CC'),
    "bcc" => env('SIANTECH_LOGMAILER_BCC'),
    "subject" => env('SIANTECH_LOGMAILER_SUBJECT', env('APP_NAME') . " logs"),

    "delete_after_send" => false,

    "exclude" => ['worker']
];
