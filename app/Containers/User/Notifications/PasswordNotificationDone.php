<?

namespace App\Containers\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Hash;

class PasswordNotificationDone extends Notification //implements ShouldQueue
{
//use Queueable;

protected $user;
protected $password;

public function __construct(\App\Containers\User\Models\User $company){
    $this->user=$company;
  $password="password";

	$this->password=$decrypted_string=openssl_decrypt($this->user->encripted_password,"AES-128-ECB",$password);;
	\Log::info('emailVerificationCodeinSession2'.session()->get('emailVerificationCode'));
\Log::info('emailVerificationCodeinObject'.$this->password);
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
            ->line('Вы можете войти в ваш аккаунт с помощью временного пароля')
            ->line('Временный Пароль: '.$this->password);
    }

    public function via($notifiable)
    {
        return ['mail'];
    }


}
