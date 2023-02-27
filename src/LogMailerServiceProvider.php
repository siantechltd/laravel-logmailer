<?php

namespace Siantech\LogMailer;


use Illuminate\Support\ServiceProvider;

class LogMailerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(){

        if($this->app->runningInConsole()){
            $this->publishes([
                __DIR__.'/../config/logmailer.php' => config_path('logmailer.php'),
            ], 'siantech-logmailer');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/siantech'),
            ], 'siantech-logmailer');

            $this->commands([
                Console\SendLogEmailCommand::class
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/logmailer.php', 'logmailer');
    }
}
