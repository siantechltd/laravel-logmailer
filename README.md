## Laravel LogMailer

Laravel LogMailer is a simple tool that allows your application to send log files to your email address.
It's very easy to configure and in just few simple steps it's up & running.

- run ```php artisan vendor:publish --tag=siantech-logmailer``` to publish config and views. Email view is intentionally left blank so you can customise it however you want.
- define your ```to``` email address and (optional) ```subject```.
- schedule how often you'd like to receive your logs. For example, if you like to receive it hourly, use ```$schedule->command('siantech:logmailer')->hourly();``` [Read Laravel Schedule Frequency Options documentation](https://laravel.com/docs/10.x/scheduling#schedule-frequency-options).
