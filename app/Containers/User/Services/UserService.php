<?php

namespace App\Containers\User\Services;

use App\Containers\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Avatar;
class UserService
{
  public function createUser($data): User
  {
      $nameAvatar=time() . '.jpg' ;

     // \Avatar::create($data->firstName.' '.$data->lastName)->save('avatars'.$nameAvatar, 100);

      return User::create([
      'name' => $data->firstName,
      'sername' => $data->lastName,
      'email' => $data->email,
      'password' => bcrypt($data->password),
      'country' => $data->country,
      'phone' => $data->phone,
       'avatar'=>null
    ]);
  }

  public function authenticate($data): bool
  {
    if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
      return true;
    }
    return false;
  }
}
