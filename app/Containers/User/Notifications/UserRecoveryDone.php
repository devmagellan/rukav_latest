<?

namespace App\Containers\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class UserRecoveryDone extends Notification //implements ShouldQueue
{
//use Queueable;

protected $user;
protected $code;

public function __construct($company){
    $this->user=$company;
}
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $url = url('/password_recovery/'.$this->user->verify_token);

        return (new MailMessage)
            ->subject('Сброс пароля на rukav.co.uk')
            ->greeting('Здравствуйте!')
            ->line('Кто-то запросил сброс пароля на сайте www.rukav.co.uk ')
            ->line('Email вашего аккаунта:'.$this->user->email)
            ->line('Если это ошибка, просто игнорируйте этот емайл ')
            ->line('Чтобы сбросить ваш пароль и установить новый, пройдите по ссылке:  ')
            ->action('Сбросить пароль', $url)
            ;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
