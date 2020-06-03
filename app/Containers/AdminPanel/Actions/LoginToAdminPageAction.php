<?php


namespace AdminPanel\Actions;


use App\Containers\User\Services\UserService;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Auth;

class LoginToAdminPageAction
{
  /**
   * @var UserService
   */
  private $service;

  public function __construct(UserService $service)
  {
    $this->service = $service;
  }

  public function run($data)
  {

  }
}
