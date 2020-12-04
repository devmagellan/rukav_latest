<?php

namespace App\Containers\User\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Containers\User\Notifications\SendAdvRequest;
use App\Containers\User\Models\User;
use Log;

class SendComplainRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $request;

    public function __construct($request)
    {

        $this->request=$request;

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
		Log::info('handle2: ',$this->request);
		(new User)->forceFill([
		'name' => 'contactform',
		'email' => 'dev.magellan@gmail.com',
		])->notify(new SendAdvRequest($this->request));

    }
}
