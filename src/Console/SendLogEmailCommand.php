<?php

namespace Siantech\LogMailer\Console;

use Illuminate\Console\Command;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\Mail;
use Siantech\LogMailer\Mail\SendHourlyLogsEmail;

class SendLogEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siantech:send-log-files';

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
        $logs = [];
        $files = [];

        foreach (glob(storage_path(). "/logs/*.log") as $filename) {
            $logs[] = Attachment::fromPath($filename);
            $files[] = $filename;
        }

        if(!empty($logs)) {
            try {
                Mail::send(new SendHourlyLogsEmail($logs));
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
