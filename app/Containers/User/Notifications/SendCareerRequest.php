<?

namespace App\Containers\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class SendCareerRequest extends Notification //implements ShouldQueue
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
\Log::info('CareerRequest',$this->request['file']);
        return (new MailMessage)
            ->subject('Письмо из формы обратной связи')
            ->greeting('Здравствуйте!')
            ->line('Мы получили новый запрос со страницы реклама на RUKAV')
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
