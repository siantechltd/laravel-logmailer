<?php

namespace Siantech\LogMailer\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Siantech\LogMailer\Mail\SendHourlyLogsEmail;

class SendLogEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siantech:logmailer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send your application logs by email every hour.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $files = [];

        foreach (glob(storage_path(). "/logs/*.log") as $filename) {
            $ignore = false;
            foreach (config('logmailer.exclude') as $exclude){
                if(str_contains($filename, $exclude)){
                    $ignore = true;
                    continue;
                }
            }
            if(!$ignore)
                $files[] = $filename;
        }

        if(!empty($files)) {
            try {
                Mail::send(new SendHourlyLogsEmail($files));
            }catch (\Exception $ex){
                $this->error($ex->getMessage());
                return Command::FAILURE;
            }

            if(config('logmailer.delete_after_send') === true) {
                foreach ($files as $file) {
                    unlink($file);
                }
            }
        }

        return Command::SUCCESS;
    }
}
