<?php


namespace App\Containers\User\Actions;

use App\Containers\User\Services\UserService;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Http\Response;


class CreateUserAccountAction extends Action
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
    try {
      if ($data->vid_user == 'Бизнес') {
        Apiato::call('User@CreateUserAccountWithBusinessAccountTask', [$data]);
      } elseif ($data->vid_user == 'Частная') {
        Apiato::call('User@CreateUserAccountTask', [$data]);
      }
    } catch (\Throwable $exception) {
      return response(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $this->service->authenticate($data);
    return response(['message' => 'account created'], Response::HTTP_OK);
  }
}
