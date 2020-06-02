<?php

namespace App\Containers\User\Services;

use App\Containers\User\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
  public function createUser($data): User
  {
    return User::create([
      'name' => $data->firstName,
      'sername' => $data->lastName,
      'email' => $data->email,
      'password' => bcrypt($data->password),
      'country' => $data->country,
      'phone' => $data->phone,
    ]);
  }

  public function authenticate($data)
  {
    if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
      // Authentication passed...

    }
  }
}
