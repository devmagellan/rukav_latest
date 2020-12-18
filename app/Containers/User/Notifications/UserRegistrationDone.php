<?

namespace App\Containers\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class UserRegistrationDone extends Notification //implements ShouldQueue
{
//use Queueable;

protected $user;
protected $code;
public $theme='SomeRegistartion';

public function __construct($company){
    $this->user=$company;
	\Log::info('emailVerificationCodeinObject4',array($this->user));
}
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
		\Log::info('emailVerificationCodeinObject5',array($this->user));

        $url = url('/verify/'.$this->user->verify_token);

        return (new MailMessage)
            ->subject('Регистрация rukav.co.uk')
            ->greeting('Здравствуйте!')
            ->line('Спасибо за регистрацию на сайте «RUKAV», Британской платформы объявлений для русскоговорящих в UK. Пожалуйста, подтвердите ваш адрес электронной почты, чтобы мы могли отправлять вам уведомления о ваших объявлениях и другие важные новости.!')
            ->action('Подтвердить регистрацию', $url)
            ->salutation('Вы получили это письмо, потому что зарегистрированы на сайте «RUKAV». 
Если у вас есть вопросы, воспользуйтесь разделом «Помощь» или напишите нам на support@rukav.co.uk.
Если вы больше не хотите получать нашу рассылку, нажмите сюда. Мы будем скучать!')
            ;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
