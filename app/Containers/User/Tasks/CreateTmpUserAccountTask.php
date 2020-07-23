<?php


namespace App\Containers\User\Tasks;

use App\Containers\User\Services\TmpUserService;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;

class CreateTmpUserAccountTask
{
  private $service;

  public function __construct(TmpUserService $service)
  {
    $this->service = $service;
  }

  public function run($data)
  {
    return $this->service->createUser($data);
  }
}
