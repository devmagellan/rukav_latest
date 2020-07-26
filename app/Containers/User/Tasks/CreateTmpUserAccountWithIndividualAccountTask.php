<?php


namespace App\Containers\User\Tasks;

use App\Containers\User\Services\IndividualAccountService;
use App\Containers\User\Services\TmpUserService;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;

class CreateTmpUserAccountWithIndividualAccountTask
{
  private $service;
  /**
   * @var UserService
   */
  private $userService;

    protected $user;

  public function __construct(IndividualAccountService $service, TmpUserService $userService)
  {
    $this->service = $service;

    $this->userService = $userService;
  }

  public function run($data)
  {
    DB::transaction(function () use ($data) {
        $this->user = $this->userService->createUser($data);

       $this->service->createIndividualAccount($data, $this->user->id);


    });
      \Log::info('user=>',array($this->user));
      return $this->user;

  }
}
