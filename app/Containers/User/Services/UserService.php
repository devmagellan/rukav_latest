<?php

namespace App\Containers\User\Services;

use App\Containers\User\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Avatar;

class UserService
{
  public function createUser($data): User
  {
      $nameAvatar=time() . '.jpg' ;
      \Log::info('UserData=>',array($data));
      try {
     // \Avatar::create($data->firstName.' '.$data->lastName)->save('avatars'.$nameAvatar, 100);
      return User::updateOrCreate([
      'id'=>$data->customer_id,
      'name' => $data->firstName,
      'sername' => $data->lastName,
      'email' => $data->email,
      'password' => ($data->customer_id) ? $data->password : bcrypt($data->password),
      'country' => $data->country,
      'phone' => $data->phone,
      'vid_user' => $data->vid_user,
      'avatar'=>($data->customer_id) ? $data->avatar : null,
      'active'=>($data->customer_id) ? $data->active : 1,
      'is_client'=>($data->customer_id) ? $data->is_client : 1,
      'confirmed'=> ($data->admin_side==1) ? 0 : 1,
      'is_confirmed_phone'=> ($data->admin_side==1 && $data->phone) ? 0 : 1
    ]);
      } catch (\Throwable $exception) {
          \Log::info('exception',array($exception));
      }
  }

    public function updateUserInService($data)
    {

        \Log::info('user--=>'.$data['id']);
          User::where('id',$data['id'])->update([
            'name' => $data['name'],
            'sername' => $data['sername'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'vid_user' => $data['vid_user'],
              'skype' => $data['skype'],
              'facebook' => $data['facebook'],
              'instagram' => $data['instagram'],
              'www' => $data['www'],

        ]);
        return User::where('id',$data['id'])->first();
    }

  public function authenticate($data): bool
  {
    if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
      return true;
    }
    return false;
  }
}
