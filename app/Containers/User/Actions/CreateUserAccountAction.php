<?php


namespace App\Containers\User\Actions;

use App\Containers\User\Services\TmpUserService;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use App\Containers\User\Services\SmsService;
use App\Containers\User\Notifications\CompanyRegistrationDone;
use App\Containers\User\Jobs\SendEmailVerification;
use App\Containers\User\Jobs\SendPasswordNotification;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Illuminate\Support\Facades\Hash;

class CreateUserAccountAction extends Action
{
  /**
   * @var UserService
   */
  private $service;
    private $smsService;

  public function __construct(TmpUserService $service,SmsService $smsService)
  {
    $this->service = $service;
      $this->smsService = $smsService;
  }

  public function run($data)
  {

      //session()->forget('emailVerificationCode');
    try {
      if ($data->vid_user == 'Организация') {
          \Log::info('User from admin=>',array($data));
        if($data->admin_side==1){
          $user=Apiato::call('User@CreateUserAccountWithOrganisationAccountTask', [$data]);
        }
        else{
          $user=Apiato::call('User@CreateTmpUserAccountWithOrganisationAccountTask', [$data]);

      $message=$this->smsService->store($data);
      session()->put('emailVerificationTelephone',$user->phone);
      \Log::info('message=>',array($user));}
      }
        elseif ($data->vid_user == 'Предприниматель') {
          if($data->admin_side==1){
            $user=Apiato::call('User@CreateUserAccountWithIndividualAccountTask', [$data]);
          }
          else{
            $user=Apiato::call('User@CreateTmpUserAccountWithIndividualAccountTask', [$data]);

            $message=$this->smsService->store($data);
            \Log::info('message=>',array($user));
            session()->put('emailVerificationTelephone',$user->phone);}
        }
      elseif ($data->vid_user == 'Компания') {
        if($data->admin_side==1){
          $user=Apiato::call('User@CreateUserAccountWithBusinessAccountTask', [$data]);
        }
        else{
          $user=Apiato::call('User@CreateTmpUserAccountWithBusinessAccountTask', [$data]);

          $message=$this->smsService->store($data);
          session()->put('emailVerificationTelephone',$user->phone);
          \Log::info('message=>',array($user));}
      }
      elseif ($data->vid_user == 'Частная') {
      if($data->admin_side==1){
        $user=Apiato::call('User@CreateUserAccountTask', [$data]);
      }
      else{
        $user=Apiato::call('User@CreateTmpUserAccountTask', [$data]);}
      }
    } catch (\Throwable $exception) {
      return response(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    if($data->admin_side!=1 ){
      $emailCode = rand(1000, 9999); //generate random code
      session()->put('emailVerificationCode',$emailCode);
      session()->put('emailVerificationCodeUser',$user->id);
	  $user->emailCode=$emailCode;
	  $user->save();
      session()->put('emailVerificationCodePassword',$data->password);
	   \Log::info('emailVerificationCode'.$emailCode);
	  \Log::info('emailVerificationCodeinSession'.session()->get('emailVerificationCode'));
	  session()->save();
	  dispatch(new SendEmailVerification($user))->onQueue('queue_name');
      //$this->sendCompanyRegistrationDoneNotification($user);
      \Log::info($data);}
    elseif($data->admin_side==1 && $data->send_notification==1){
/*      $key = Key::createNewRandomKey();
      \Log::info('KEY:'.$key);*/
      $random=$this->randomPassword();
/*      $encrypted = Crypto::encrypt($random, $key);
      $plaintext = Crypto::decrypt($encrypted, $key);*/
      $string_to_encrypt="Test";
      $password="password";
      $encrypted_string=openssl_encrypt($random,"AES-128-ECB",$password);
      $decrypted_string=openssl_decrypt($encrypted_string,"AES-128-ECB",$password);
      \Log::info('$decrypted_string:'.$decrypted_string);
      $user->encripted_password=$encrypted_string;
      \Log::info('Password:'.$random);
      $user->password=Hash::make($random);
      $user->save();
      dispatch(new SendPasswordNotification($user))->onQueue('queue_name');

 /*     $data = base64_decode($encrypted);
      $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

      $decrypted = rtrim(
        mcrypt_decrypt(
          MCRYPT_RIJNDAEL_128,
          hash('sha256', $key, true),
          substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
          MCRYPT_MODE_CBC,
          $iv
        ),
        "\0"
      );*/
    }
    else{

    }
    //$this->service->authenticate($data);
    return response(['message' => 'account created'], Response::HTTP_OK);
  }

  public function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }





    public function sendCompanyRegistrationDoneNotification(Model $company)
    {
        return $this->sendNotification($company);
    }

    public function sendNotification(Model $company)
    {

        $company->notify(new CompanyRegistrationDone($company));

    }
}
