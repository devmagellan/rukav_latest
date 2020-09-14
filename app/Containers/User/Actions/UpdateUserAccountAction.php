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

class UpdateUserAccountAction extends Action
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
    try {
      if ($data->vid_user == 'Организация') {
          \Log::info('User from admin=>',array($data));
        if($data->admin_side==1){
          $user=Apiato::call('User@UpdateUserAccountWithOrganisationAccountTask', [$data]);
        }
      }
        elseif ($data->vid_user == 'Предприниматель') {
          if($data->admin_side==1){
            $user=Apiato::call('User@UpdateUserAccountWithIndividualAccountTask', [$data]);
          }
        }
      elseif ($data->vid_user == 'Компания') {
        if($data->admin_side==1){
          $user=Apiato::call('User@UpdateUserAccountWithBusinessAccountTask', [$data]);
        }
      }
      elseif ($data->vid_user == 'Частная') {
      if($data->admin_side==1){
        $user=Apiato::call('User@UpdateUserAccountTask', [$data]);
      }
      }
    } catch (\Throwable $exception) {
      return response(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    //$this->service->authenticate($data);
    return response(['message' => 'account created'], Response::HTTP_OK);
  }
}
