<?

namespace App\Containers\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class SendComplainRequest extends Notification //implements ShouldQueue
{
//use Queueable;

protected $user;

public function __construct($request){
    $this->request=$request;
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
            ->subject('Новая жалоба с сайта RUKAV')
            ->greeting('Здравствуйте!')
            ->line('Мы получили новую жалобу с сайта RUKAV')
            ->line('Email отправителя:'.$this->request['sender_email'])
            ->line('Имя отправителя: '.$this->request['sender_name'])
			->line('Телефон отправителя: '.$this->request['sender_phone'])
            ->line('Текст сообщения: '.$this->request['text']);

    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
