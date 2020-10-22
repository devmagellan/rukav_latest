<?php


namespace App\Containers\User\Tasks;

use App\Containers\User\Services\IndividualAccountService;
use App\Containers\User\Services\UserService;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;

class UpdateUserAccountWithIndividualAccountTask
{
  protected $service;
  /**
   * @var UserService
   */
  protected $userService;

    protected $user;

  public function __construct(IndividualAccountService $service, UserService $userService)
  {
    $this->service = $service;

    $this->userService = $userService;
  }

  public function run($data)
  {
      \Log::info('task2=>',$data);
      DB::transaction(function () use ($data) {
          $this->user = $this->userService->createUser($data);
          \Log::info('task3=>', array($this->user));
          $this->service->createIndividualAccount($data, $data['id']);
      });


      \Log::info('user8=>',array($this->user));
      return $this->user;

  }
}
