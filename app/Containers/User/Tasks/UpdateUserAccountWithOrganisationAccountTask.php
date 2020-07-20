<?php


namespace App\Containers\User\Tasks;

use App\Containers\User\Services\OrganisationAccountService;
use App\Containers\User\Services\UserService;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;

class UpdateUserAccountWithOrganisationAccountTask
{
  protected $service;
  /**
   * @var UserService
   */
  protected $userService;

    protected $user;

  public function __construct(OrganisationAccountService $service, UserService $userService)
  {
    $this->service = $service;

    $this->userService = $userService;
  }

  public function run($data)
  {
      \Log::info('task2=>',$data);
      DB::transaction(function () use ($data) {
          $this->user = $this->userService->updateUserInService($data);
          \Log::info('task3=>', array($this->user));
          $this->service->createOrganisationAccount($data, $data['id']);
      });


      \Log::info('user8=>',array($this->user));
      return $this->user;

  }
}
