<?

namespace App\Containers\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class SendingMessangersNotification extends Notification //implements ShouldQueue
{
//use Queueable;

protected $connect;
protected $user;

public function __construct($connect){
    $this->connect=$connect;
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
            ->line('Вы получили следующее сообщение на сайте RUKAV.')
          ->line($this->connect->text)
            ;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
