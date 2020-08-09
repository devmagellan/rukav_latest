<?php

namespace App\Containers\User\Services;

use App\Containers\User\Models\TmpUser;
use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Avatar;

class TmpUserService
{
  public function createUser($data): TmpUser
  {
      $nameAvatar=time() . '.jpg' ;

     // \Avatar::create($data->firstName.' '.$data->lastName)->save('avatars'.$nameAvatar, 100);
      return TmpUser::create([
      'name' => $data->firstName,
      'sername' => $data->lastName,
      'email' => $data->email,
      'password' => bcrypt($data->password),
      'country' => $data->country,
      'phone' => $data->phone,
      'vid_user' => $data->vid_user,
      'avatar'=>null
    ]);
  }

}
