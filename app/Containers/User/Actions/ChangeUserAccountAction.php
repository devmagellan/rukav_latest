<?php


namespace App\Containers\User\Actions;

use App\Containers\User\Services\UserService;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use App\Containers\User\Services\SmsService;
use App\Containers\User\Notifications\CompanyRegistrationDone;


class ChangeUserAccountAction extends Action
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
      session()->forget('emailVerificationCodeUser');
      if(!is_array($data)){$data=$data->all();}
      \Log::info('Data=>',$data);

    try {
      if ($data['vid_user'] == 'Организация') {
          $user=Apiato::call('User@UpdateUserAccountWithOrganisationAccountTask', [$data]);


      \Log::info('message=>',array($user));
      }
        elseif ($data['vid_user'] == 'Предприниматель') {
            \Log::info('popali=>');
            $user=Apiato::call('User@UpdateUserAccountWithIndividualAccountTask', [$data]);
            \Log::info('message=>',array($user));

        }
      elseif ($data['vid_user'] == 'Компания') {
          $user=Apiato::call('User@UpdateUserAccountWithBusinessAccountTask', [$data]);
          \Log::info('message=>',array($user));
      }
    } catch (\Throwable $exception) {
      return response(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
      \Log::info($data);
    //$this->service->authenticate($data);
    return response(['message' => 'account changed'], Response::HTTP_OK);
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
