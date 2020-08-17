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
    \Log::info('User from admin=>',array($data));
      //session()->forget('emailVerificationCode');
    try {
      if ($data->vid_user == 'Организация') {
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
    if($data->admin_side!=1){
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
    //$this->service->authenticate($data);
    return response(['message' => 'account created'], Response::HTTP_OK);
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
