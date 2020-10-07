<?php

namespace App\Containers\User\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Containers\User\Notifications\UserSocialRegistrationDone;
use Log;

class VerifySocialMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;

    public function __construct($user)
    {
		Log::info('SendEmailVerification.php: '.date("Y-m-d H:i:s").
			'start process construct 22string');

			Log::info('user: ',array($user));
        $this->user=$user;
						//\Log::info('emailVerificationCodeinSession2'.session()->get('emailVerificationCode'));
        //\Log::info('emailVerificationCodeinObject'.$this->user->emailCode);

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
	\Log::info('emailVerificationCodeinSession2'.session()->get('emailVerificationCode'));
		//\Log::info('emailVerificationCodeinObject'.$this->user->emailCode);
		\Log::info('emailVerificationCodeinObject',array($this->user));
		Log::info('handle: '.date("Y-m-d H:i:s"));
		$this->user->notify(new UserSocialRegistrationDone($this->user));

    }
}
