<?php

namespace App\Containers\User\Services;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Jobs\VerifyMail;
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
      \Log::info('UserData3=>',array($data));

	if(is_array($data)){
		\Log::info('UserData5=>');
	$data = json_decode(json_encode($data), FALSE);}
      try {


      $current=\App\Containers\User\Models\User::where('email',$data->email)->withTrashed()->first();
      \Log::info('CurrentUser=>',array($current));
	    if(isset($data->id) && null!=($data->id)){
          $currentById=\App\Containers\User\Models\User::where('id',$data->id)->withTrashed()->first();
		  $id=$data->id;
       /*   if($currentById->email!=$user->email){

          }*/
        }else{
	  $id=(null!=($data->customer_id)/* && $current==null*/)  ? $data->customer_id : (($current!=null) ? $current->id : null );
		}
	  \Log::info('CurrentUserID=>'.$id);
        $newUser = User::withTrashed()->updateOrCreate(['id'=>$id],[
      'name' => (property_exists($data, 'save_url') ) ? $data->name : $data->firstName,
      'sername' => (property_exists($data, 'save_url') ) ? $data->sername : $data->lastName,
      'email' => $data->email,
      'password' => (property_exists($data, 'customer_id') && $current!=null && $data->admin_side==1 || null!=($data->save_url) && $current!=null) ? $current->password : bcrypt($data->password),
      'country' => $data->country,
      'phone' => /* (!property_exists($data, 'save_url') ) ? */ (substr($data->phone, 0, 1) === '+') ? $data->phone : $data->code.$data->phone  /* : $current->phone */,
      'vid_user' => $data->vid_user,
      'avatar'=>(property_exists($data, 'customer_id')  && $data->customer_id) ? $data->avatar : null,
      'active'=>(property_exists($data, 'customer_id')  && $data->customer_id) ? $data->active : 1,
      'is_client'=>(property_exists($data, 'customer_id')  && $data->customer_id) ? $data->is_client : 1,
      'confirmed'=> (isset($currentById) && $currentById->email!=$data->email) ? User::STATUS_INACTIVE :  ((isset($data->admin_side) && $data->admin_side==1) ? User::STATUS_CREATED_BY_ADMIN_NOT_CONFIRMED  :((property_exists($data, 'customer_id')  && $data->customer_id) ? $data->confirmed : User::STATUS_INACTIVE)),
      'is_confirmed_phone'=> (property_exists($data, 'customer_id')  && $data->customer_id) ? $data->is_confirmed_phone : 0,
      'admin_created_confirmation'=>null,
      'verify_token' => Str::random(),
      'deleted_at'=>null
    ]);
        \Log::info('UserData5=>',array($newUser));
        return $newUser;
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
