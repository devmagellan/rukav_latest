<?

namespace App\Containers\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class ExpiredAdsNotification extends Notification //implements ShouldQueue
{
//use Queueable;

protected $user;
protected $code;

public function __construct($company){
    $this->user=$company;
	\Log::info('emailVerificationCodeinSession2'.session()->get('emailVerificationCode'));
\Log::info('emailVerificationCodeinObject'.$this->user->emailCode);
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
            ->line('Срок действия подачи Вашего объявления истекает');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
