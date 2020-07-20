<?php


namespace App\Containers\User\Actions;

use App\Containers\User\Services\UserService;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use App\Containers\User\Services\SmsService;
use App\Containers\User\Notifications\CompanyRegistrationDone;


class CreateUserAccountAction extends Action
{
  /**
   * @var UserService
   */
  private $service;
    private $smsService;

  public function __construct(UserService $service,SmsService $smsService)
  {
    $this->service = $service;
      $this->smsService = $smsService;
  }

  public function run($data)
  {
      session()->forget('emailVerificationCode');
    try {
      if ($data->vid_user == 'Организация') {
          $user=Apiato::call('User@CreateUserAccountWithOrganisationAccountTask', [$data]);

      $message=$this->smsService->store($data);
      session()->put('emailVerificationTelephone',$user->phone);
      \Log::info('message=>',array($user));
      }
        elseif ($data->vid_user == 'Предприниматель') {
            $user=Apiato::call('User@CreateUserAccountWithIndividualAccountTask', [$data]);

            $message=$this->smsService->store($data);
            \Log::info('message=>',array($user));
            session()->put('emailVerificationTelephone',$user->phone);
        }
      elseif ($data->vid_user == 'Компания') {
          $user=Apiato::call('User@CreateUserAccountWithBusinessAccountTask', [$data]);

          $message=$this->smsService->store($data);
          session()->put('emailVerificationTelephone',$user->phone);
          \Log::info('message=>',array($user));
      }
      elseif ($data->vid_user == 'Частная') {

        $user=Apiato::call('User@CreateUserAccountTask', [$data]);
      }
    } catch (\Throwable $exception) {
      return response(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
      $emailCode = rand(1000, 9999); //generate random code
      session()->put('emailVerificationCode',$emailCode);
      session()->put('emailVerificationCodeUser',$user->id);
      session()->put('emailVerificationCodePassword',$data->password);
      $this->sendCompanyRegistrationDoneNotification($user);
      \Log::info($data);
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
