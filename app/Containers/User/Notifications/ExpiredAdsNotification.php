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
            ->greeting('Приветствуем!')
            ->line('Здравствуйте !  Срок вашего обьявления истекает через 2 дня.   
                    Хотите его продлить ? ')
            ->action('Продлить объявление', 'http://apiato/private_cabinet#myads')
            ->outroLines('')
            ;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
