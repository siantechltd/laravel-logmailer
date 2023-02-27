[//]: # (<p align="center"><a href="https://siantech.net" target="_blank"><img src="https://raw.githubusercontent.com/siantechltd/art/main/logo-siantech.png?token=GHSAT0AAAAAAB7EUJWNDCGEWBCFR4P6IEJSY75FPRA" width="400" alt="SiaNTech logo"></a></p>)


<p align="center">
<a href="https://packagist.org/packages/siantech/laravel-logmailer"><img src="https://img.shields.io/packagist/dt/siantech/laravel-logmailer" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/siantech/laravel-logmailer"><img src="https://img.shields.io/packagist/v/siantech/laravel-logmailer" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/siantech/laravel-logmailer"><img src="https://img.shields.io/packagist/l/siantech/laravel-logmailer" alt="License"></a>
</p>


## Laravel LogMailer

Laravel LogMailer is a simple tool that allows your application to send log files to your email address.
It's very easy to configure and in just few simple steps it's up & running.

### Install

To install, simply run ```composer require siantech/laravel-logmailer```

### Config

- run ```php artisan vendor:publish --tag=siantech-logmailer``` to publish config and views. Email view is intentionally left blank so you can customise it however you want.
- in ```config/logmailer.php``` update your ```to``` email address and (optional) ```subject```.
- in ```app/Console/Kernel.php```, schedule how often you'd like to receive your logs. For example, if you like to receive it hourly, use ```$schedule->command('siantech:logmailer')->hourly();``` [Read Laravel Schedule Frequency Options documentation](https://laravel.com/docs/10.x/scheduling#schedule-frequency-options).
