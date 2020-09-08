<?

namespace App\Containers\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class CompanyRegistrationDone extends Notification //implements ShouldQueue
{
//use Queueable;

protected $user;
protected $code;

public function __construct($company){
    $this->user=$company;
	$this->code=$this->user->emailCode;
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
            ->greeting('Здравствуйте!')
            ->line('Спасибо за регистрацию на сайте «RUKAV», Британской платформы объявлений для русскоговорящих в UK. Пожалуйста, подтвердите ваш адрес электронной почты, чтобы мы могли отправлять вам уведомления о ваших объявлениях и другие важные новости.!')
            ->line('Ваш код: '.$this->code)
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
