<?php


namespace App\Containers\User\Tasks;

use App\Containers\User\Services\OrganisationAccountService;
use App\Containers\User\Services\UserService;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;

class CreateUserAccountWithOrganisationAccountTask
{
  private $service;
  /**
   * @var UserService
   */
  private $userService;

    protected $user;

  public function __construct(OrganisationAccountService $service, UserService $userService)
  {
    $this->service = $service;

    $this->userService = $userService;
  }

  public function run($data)
  {
    DB::transaction(function () use ($data) {
        $this->user = $this->userService->createUser($data);
        \Log::info('Task from admin=>',array($this->user));
       $this->service->createOrganisationAccount($data, $this->user->id);


    });
      \Log::info('user=>',array($this->user));
      return $this->user;

  }
}
