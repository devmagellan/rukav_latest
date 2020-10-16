<?php

namespace App\Containers\User\Services;

use App\Containers\User\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Str;

class UserService
{
  public function createUser($data): User
  {
      $nameAvatar=time() . '.jpg' ;
      \Log::info('UserData=>',array($data));
    \Log::info('UserData2=>',array($data[0]));
      try {


      $current=\App\Containers\User\Models\User::where('email',$data->email)->withTrashed()->first();
      \Log::info('CurrentUser=>',array($current));
	  $id=($current!=null) ? $current->id : $data->customer_id;
	  \Log::info('CurrentUserID=>'.$id);
      return User::withTrashed()->updateOrCreate(['id'=>$id],[
      'name' => $data->firstName,
      'sername' => $data->lastName,
      'email' => $data->email,
      'password' => ($data->customer_id && $current!=null && $data->admin_side==1 ) ? $current->password : bcrypt($data->password),
      'country' => $data->country,
      'phone' => $data->code.$data->phone,
      'vid_user' => $data->vid_user,
      'avatar'=>($data->customer_id) ? $data->avatar : null,
      'active'=>($data->customer_id) ? $data->active : 1,
      'is_client'=>($data->customer_id) ? $data->is_client : 1,
      'confirmed'=> ($data->customer_id) ? $data->confirmed : User::STATUS_INACTIVE,
      'is_confirmed_phone'=> ($data->customer_id) ? $data->is_confirmed_phone : 0,
      'verify_token' => Str::random(),
      'deleted_at'=>null
    ]);
      } catch (\Throwable $exception) {
          \Log::info('exception',array($exception));
      }
  }

/*    public function updateUserInService($data)
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
    }*/

  public function authenticate($data): bool
  {

    if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
      return true;
    }
    return false;
  }
}
