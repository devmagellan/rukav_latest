<?php


namespace App\Containers\User\Tasks;

use App\Containers\User\Services\UserService;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;

class UpdateUserAccountTask
{
  private $service;

  public function __construct(UserService $service)
  {
    $this->service = $service;
  }

  public function run($data)
  {
    return $this->service->updateUserInService($data);
  }
}
