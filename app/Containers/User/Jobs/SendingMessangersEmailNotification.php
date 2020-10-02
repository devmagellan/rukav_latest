<?php

namespace App\Containers\User\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Containers\User\Notifications\SendingMessangersNotification;
use Log;

class SendingMessangersEmailNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $connect;

    public function __construct($connect)
    {
		Log::info('SendEmailVerification.php: '.date("Y-m-d H:i:s").
			'start process construct 22string');

			Log::info('user: ',array($connect));
        $this->connect=$connect;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		//$this->user->sendEmailVerificationNotification();

		//$this->user->notify(new CustomerEmail($this->user));
		Log::info('handle: '.date("Y-m-d H:i:s"));

		$this->connect->receiver->notify(new SendingMessangersNotification($this->connect));

    }
}
