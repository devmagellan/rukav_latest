<?

namespace App\Containers\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class CompanyRegistrationDone extends Notification //implements ShouldQueue
{
//use Queueable;

public $user;

public function __construct(\App\Containers\User\Models\User $company){
    $this->user=$company;

    $this->user=\App\Containers\User\Models\User::where('email',$this->user->email)->first();
}
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Ваш код для верификации EMAIL')
            ->line('VerificationCode: '.session()->get('emailVerificationCode'));
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}