<?php

namespace App\Containers\User\UI\WEB\Controllers;

use App\Containers\HomePage\Services\GlobalService;
use App\Containers\User\Jobs\ExpiredAdsEmailVerification;
use App\Containers\User\Jobs\VerifyMail;
use App\Containers\User\Models\BusinessUser;
use App\Containers\User\UI\WEB\Requests\RegisterUserRequest;
use App\Containers\User\UI\WEB\Requests\ChangeFromSimpleUserRequest;
use App\Containers\User\UI\WEB\Requests\GoToBusinessUsersRequest;
use App\Ship\Parents\Controllers\WebController;
use App\Containers\User\UI\WEB\Requests\GetAllUsersRequest;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Services\UserService;
use App\Containers\User\Services\SmsService;
use Illuminate\Support\Facades\Hash;
use \App\Containers\User\Models\User;
use PragmaRX\Firewall\Vendor\Laravel\Facade as Firewall;
use Illuminate\Support\Str;

/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends WebController
{


    protected $service;
    protected $smsService;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function notify(GetAllUsersRequest $request){
        $user=\App\Containers\User\Models\User::where('id',1)->first();
        dispatch(new ExpiredAdsEmailVerification($user))->onQueue('queue_name');
    }

  /**
   * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function sayWelcome()
  {   // user say welcome
    return view('user::user-welcome');
  }

  /**
   * Show all entities
   *
   * @param GetAllUsersRequest $request
   */
  public function index($deleted=null,GetAllUsersRequest $request)
  {
    //$adminpanels = Apiato::call('AdminPanel@GetAllAdminPanelsAction', [$request]);
    //$data=$this->mainSettings();
    //$data['menu']=$this->menu();
    $role = \Auth::user()->roles;


    $data['deleted']=$deleted;
    $data['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
    $data['title'] = "Додати товар";
    $data['keywords'] = "Ukrainian industry platform";
    $data['description'] = "Ukrainian industry platform";
    return view('user::index', $data);
  }

  public function indexAdmin($deleted=null,GetAllUsersRequest $request)
  {
    //$adminpanels = Apiato::call('AdminPanel@GetAllAdminPanelsAction', [$request]);
    //$data=$this->mainSettings();
    //$data['menu']=$this->menu();
    $role = \Auth::user()->roles;
      $data['deleted']=$deleted;
    $data['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
    $data['title'] = "Додати товар";
    $data['keywords'] = "Ukrainian industry platform";
    $data['description'] = "Ukrainian industry platform";
    return view('user::admins.index', $data);
  }
  public function postData(GetAllUsersRequest $request)
  {

    $data['title'] = "Customers postData";
      if ($request->input('deleted')=='deleted') {
          $data['customers'] = \App\Containers\User\Models\User::onlyTrashed()->where('is_client',1)->with('getCustomersCompany')->get();
          $data['deleted'] = 1;
      } else {
          $data['customers'] = \App\Containers\User\Models\User::where('is_client',1)->with('getCustomersCompany')->get();
      }
      $company_id = 1;//\Auth::user()->getCompany[0]->id;
    return view('user::table', $data);
  }

  public function postAdminsData(GetAllUsersRequest $request)
  {

    $data['title'] = "Customers postData";
    $company_id = 1;//\Auth::user()->getCompany[0]->id;
    /*$data['customers']=\App\User::join('customers', function ($join) use ($company_id) {
        $join->on('users.id', '=', 'customers.user_id')
            ->where('customers.company_id', $company_id);
    })->with('getCustomersCompany')->get();*/
    if ($request->input('deleted')=='deleted') {
      $data['customers'] = \App\Containers\User\Models\User::onlyTrashed()->where('is_client',0)->get();
        $data['deleted'] = 1;
    } else {
      $data['customers'] = \App\Containers\User\Models\User::where('is_client',0)->get();
    }
    //rightJoin('customers', 'users.id', '=', 'user_id')->where('customers.company_id',$company_id)
    return view('user::admins.table', $data);
  }


  public function emailCheck(GetAllUsersRequest $request)
  {
    $belonging=false;
    if(null != $request->input('customer_id') && null != ($request->input('email'))){
        $belonging = boolval(\App\Containers\User\Models\User::where('id',$request->input('customer_id'))->where('email', $request->input('email'))->first());
    }
    if (null !== ($request->input('email'))) {
      $email = $request->input('email');
      $results = \App\Containers\User\Models\User::where('email', $email)->first();
      if ($results) {
        return json_encode(["result"=>"taken",'belonging'=>$belonging]);
      } else {
        return json_encode(["result"=>'not_taken','belonging'=>$belonging]);
      }

    }
  }

  public function phoneCheck(GetAllUsersRequest $request)
  {
    $belonging=false;
    if(null != $request->input('customer_id') && null != ($request->input('phone'))){
      $belonging = boolval(\App\Containers\User\Models\User::where('id',$request->input('customer_id'))->where('phone', $request->input('phone'))->first());
    }
    if (null !== ($request->input('phone'))) {
      $phone = $request->input('phone');
      $results = \App\Containers\User\Models\User::where('phone', $phone)->first();
      if ($results) {
        return json_encode(["result"=>"taken",'belonging'=>$belonging]);
      } else {
        return json_encode(["result"=>'not_taken','belonging'=>$belonging]);
      }

    }
  }

  public function sernameCheck(GetAllUsersRequest $request)
  {
    $belonging=false;
    if(null != $request->input('customer_id') && null != ($request->input('sername'))){
      $belonging = boolval(\App\Containers\User\Models\User::where('id',$request->input('customer_id'))->where('sername', $request->input('sername'))->first());
    }
    if (null !== ($request->input('sername'))) {
      $sername = $request->input('sername');
      $results = \App\Containers\User\Models\User::where('sername', $sername)->first();
      if ($results) {
        return json_encode(["result"=>"taken",'belonging'=>$belonging]);
      } else {
        return json_encode(["result"=>'not_taken','belonging'=>$belonging]);
      }

    }
  }

    public function postUpdate(GetAllUsersRequest $request)
    {
        $user = Apiato::call('User@UpdateUserAction', [$request]);
        return response()->json(['response'=>'success'],200);
    }

  public function postSave(GetAllUsersRequest $request)
  {
    /*$user['values'] = ['name' => $request->input('customer_name'),
      'sername' => $request->input('customer_sername'),
      'email' => $request->input('customer_email'),
      'company_id' => 1,
      'password' => Hash::make('PasswordYouCanChangeIT'),
      'non_hashed' => 'PasswordYouCanChangeIT',
      'active' => 1,
      'remember_token' => Str::random(60)];*/
    $user['attributes']['id'] = ($request->input('customer_id') != 0) ? $request->input('customer_id') : null;
    $changeRole = $user['attributes']['id'];
    $user = Apiato::call('User@CreateUserAccountAction', [$request]);
    \Log::info('USER=>',array($user));
   //$user = UserFacade::updateUser($user);
    if($request->admin_side!=1){
    if ($changeRole == null) {
      $role_data = [
        'role_id' => 5,
        'model_type' => 'App\User',
        'model_id' => $user->id
      ];
        \App\Containers\Authorization\Models\ModelHasRole::insert($role_data);
    }
/*    $string = $request->input('birth_date') . ' 16:34:00';
    $birth_date = \Carbon\Carbon::createFromFormat('m/d/Y H:i:s', $string, 'Europe/London');
    $birth_date->setTimezone('UTC');
    $start_string = $request->input('start_date') . ' 16:34:00';
    $start_date = \Carbon\Carbon::createFromFormat('m/d/Y H:i:s', $start_string, 'Europe/London');
    $start_date->setTimezone('UTC');*/
    $customer_tmp = \App\Containers\Customer\Models\Customer::where('user_id', $request->input('customer_id'))->first();}
/*    $customer['values'] = [
      'user_id' => $user->id,
      'start_date' => $start_date,
      'birth_date' => $birth_date,
      'sex' => $request->input('customer_sex'),
      'location' => $request->input('customer_location'),
      'department' => $request->input('customer_department'),
      'position' => $request->input('customer_position'),

      'phone' => $request->input('customer_phone')
      ,
      'photo' => 'avatar-a.png'
      ,
      'company_id' => $request->input('company_id'),
      'manager_id' => $request->input('manager_id'),
      'password' => Hash::make('PasswordYouCanChangeIT'),
      'remember_token' => Str::random(60),
      'non_hashed' => 'PasswordYouCanChangeIT',

    ];
    $customer['attributes']['id'] = (null != ($customer_tmp) && !empty($customer_tmp->id)) ? $customer_tmp->id : null;
    Customer::updateCustomer($customer);

    $manager = $request->input('manager');
    if ($manager == 'true') {
      $manager_data['values'] = [
        'company_id' => $user->company_id,
        'user_id' => $user->id
      ];

      $manager_data['attributes']['id'] = null;
      if (!\App\Containers\Manager\Models\Manager::where('user_id', $user->id)->first()) {
        Manager::updateManager($manager_data);
      }
    } else {
      \App\Containers\Manager\Models\Manager::where('user_id', $user->id)->delete();
    }*/


  }


  public function registerUser(RegisterUserRequest $request)
  {
   $resultCreated = Apiato::call('User@CreateUserAccountAction', [$request]);
   \Log::info(array($resultCreated));
   return $resultCreated;
  }

  public function confirmEmail(GetAllUsersRequest $request){
      if($request->input('emailConfirmation')!='' && $request->input('emailConfirmation')==session()->get('emailVerificationCode') ){
		  $tmp_user=\App\Containers\User\Models\TmpUser::where('id',session()->get('emailVerificationCodeUser'))->first();
          // replace the data
        $staff = $tmp_user->replicate();

        // make into array for mass assign.
        //make sure you activate $guarded in your Staff model
        $staff = $tmp_user->toArray();
		/* $staff['password']=bcrypt($staff['password']);*/
		$current=\App\Containers\User\Models\User::where('email',$staff['email'])->withTrashed()->first();

		if($current!=null && $current->deleted_at!=null){
			\App\Containers\User\Models\User::where('email',$staff['email'])->update($staff);
			$user=\App\Containers\User\Models\User::where('email',$staff['email'])->withTrashed()->first();
			$user->deleted_at=null;
		}
		else{
			$user=\App\Containers\User\Models\User::firstOrCreate($staff);
		}
		$user->active=1;
		$user->save();

          //$user=\App\Containers\User\Models\User::where('id',session()->get('emailVerificationCodeUser'))->first();
          $data= new \StdClass();
          $data->email=$user->email;
          $data->password=session()->get('emailVerificationCodePassword');

		  \Auth::guard('web')->loginUsingId($user->id, true);
          return response()->json(['response'=>'success'],200);
      }
      else{
          return response()->json(['response'=>'error'],400);
      }
  }

  public function confirmEmailIfRegistered(GetAllUsersRequest $request){
    if($request->input('emailConfirmation')!='' && $request->input('emailConfirmation')==session()->get('emailVerificationCode') ){
      $user=\App\Containers\User\Models\User::where('id',session()->get('emailVerificationCodeUser'))->first();
      $user->active=1;
      $user->confirmed=User::STATUS_ACTIVE;
      $user->save();
      //$user=\App\Containers\User\Models\User::where('id',session()->get('emailVerificationCodeUser'))->first();
      $data= new \StdClass();
      $data->email=$user->email;
      $data->password=session()->get('emailVerificationCodePassword');

      \Auth::guard('web')->loginUsingId($user->id, true);
      return response()->json(['response'=>'success'],200);
    }
    else{
      return response()->json(['response'=>'error'],400);
    }
  }


    public function confirmEmailPhone(GetAllUsersRequest $request){
        $error=[];
     // var_dump(session()->get('emailVerificationCode'));
/*        if($request->input('emailConfirmation')!='' && $request->input('emailConfirmation')==session()->get('emailVerificationCode') ){
            $emailConfirmed=true;
        }
        else{
            //var_dump(1);
            $emailConfirmed=false;
           $error[]='error emailCode';
        }*/
\Log::info('smsCode0'.session()->get('emailVerificationTelephone'));
$smsCode=\App\Containers\Authorization\Models\SmsVerification::where('phone',session()->get('emailVerificationTelephone'))->orderBy('id','desc')->first();
\Log::info('smsCode'.$smsCode->code);
        \Log::info('smsCode2'.$request->input('phoneConfirmationSecond'));
        if($request->input('phoneConfirmationSecond')!='' && $request->input('phoneConfirmationSecond')==$smsCode->code ){
            $phoneConfirmed=true;
        }
        else{
            //var_dump(2);
            $phoneConfirmed=false;
            $error[]='error SmsCode';
            //return response()->json(['response'=>'error SmsCode'],403);
        }
      $user=\App\Containers\User\Models\User::where('phone',session()->get('emailVerificationTelephone'))->first();
if( $user/* && $emailConfirmed*/ && $phoneConfirmed){
  $user->is_confirmed_phone=1;
  $user->save();

  if($user->confirmed===User::STATUS_ACTIVE){
      \Log::info('confirmed1',array($user));
      \Auth::guard('web')->loginUsingId($user->id, true);
      return response()->json(['response'=>'success'],200);
  }else{
      return response()->json(['response'=>'temporary'],200);
  }



}
        elseif(/*$emailConfirmed &&*/ $phoneConfirmed){
/*		$tmp_user=\App\Containers\User\Models\TmpUser::where('id',session()->get('emailVerificationCodeUser'))->first();
          // replace the data
        $staff = $tmp_user->replicate();*/

        // make into array for mass assign.
        //make sure you activate $guarded in your Staff model
        $user=\App\Containers\User\Models\TmpUser::where('id',session()->get('emailVerificationCodeUser'))->first()->toArray();

       /* $user=\App\Containers\User\Models\User::firstOrCreate($staff);*/
		$user->active=1;
		$user->save();
		if($user->confirmed==User::STATUS_ACTIVE){
            \Log::info('confirmed2');
          \Auth::guard('web')->loginUsingId($user->id, true);
            return response()->json(['response'=>'success'],200);}
            else{
                return response()->json(['response'=>'temporary'],200);
            }
        }
        return response()->json(['response'=>$error],403);
    }

    public function changeRegisterFromSimpleUser($request){
        $this->smsService=new SmsService();
        $message=$this->smsService->store($request);
        session()->put('updating_from_simpleUser',1);
        \Log::info('updating_from_simpleUserPUT');
        session()->put('emailVerificationTelephone',$request->phone);
        $collection=$request->all();
        session()->put('updatedUser',$collection);
        return response()->json(['response'=>'success'],200);
    }

    public function changeRegisterFromRestUser($request){
        Apiato::call('User@ChangeUserAccountAction', [$request]);
        session()->flash('message', 'Данные успешно обновлены!');
        return response()->json(['response'=>'success'],200);
    }

    public function confirmPhone(GetAllUsersRequest $request){
        \Log::info('emailVerificationTelephone'.session()->get('emailVerificationTelephone'));
        $error=[];
        $smsCode=\App\Containers\Authorization\Models\SmsVerification::where('phone',session()->get('emailVerificationTelephone'))->orderBy('id','desc')->first();
        if($request->input('phoneConfirmation')!='' && $request->input('phoneConfirmation')==$smsCode->code ){
            \Log::info('emailVerificationTelephoneConfirm');

            $phoneConfirmed=true;
        }
        else{
            $phoneConfirmed=false;
            $error[]='error SmsCode';
        }


        if($phoneConfirmed){
            $request=session()->get('updatedUser');
            Apiato::call('User@ChangeUserAccountAction', [$request]);
            session()->flash('message', 'Данные успешно обновлены!');
            return response()->json(['response'=>'success'],200);
        }
        return response()->json(['response'=>$error],403);
    }

    public function deleteUser(GetAllUsersRequest $request){
    if($request->input('delete_type')!='hard'){
	User::where('id',$request->input('id'))->update(['confirmed'=>User::STATUS_DELETED]);
    User::where('id',$request->input('id'))->delete();
    }
    else{
        User::withTrashed()->where('id',$request->input('id'))->forceDelete();
    }
    return json_encode(['result'=>'success']);

    }
    public function getUserData(GetAllUsersRequest $request){

        return \App\Containers\User\Models\User::where('id',$request->input('customer_id'))->first();
    }

    public function getUserRolesData(GetAllUsersRequest $request){
        $data['user']=\App\Containers\User\Models\User::where('id',$request->input('customer_id'))->with('roles')->first();
        $data['roles_array']=$data['user']->roles->pluck('id')->toArray();
        return view('user::admins.roles', $data);
    }

    public function userRecovery(GetAllUsersRequest $request){
        User::withTrashed()->find($request->input('customer_id'))->restore();
        User::where('id',$request->input('customer_id'))->update(['confirmed'=>User::STATUS_ACTIVE]);
        return json_encode(['result'=>'success']);
    }


    public function refresh(GetAllUsersRequest $request){
        \Auth::guard('web')->loginUsingId($request->input('id'), true);
        return json_encode(['result'=>'success']);
    }

    public function userСhangeRole(GetAllUsersRequest $request){
        if($request->input('state')=='false'){
            \App\Containers\Authorization\Models\ModelHasRoles::where('role_id',$request->input('role'))->where('model_id',$request->input('user'))->delete();
        }
        else{
            $insert=[
                'role_id'=>$request->input('role'),
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>$request->input('user')
            ];
            \App\Containers\Authorization\Models\ModelHasRoles::insert($insert);
        }
        return json_encode(['result'=>'success']);
    }

    public function userСhangePassword(GetAllUsersRequest $request){
        $update=['password'=>Hash::make($request->input('password'))];
      $update=['encripted_password' => openssl_encrypt($request->input('password'),"AES-128-ECB",'password')];
        if(null!=$request->input('old_password')){
          \Log::info('HashCheckOldPAssword'.$update=['password']);
            $user=User::where('id',\Auth::user()->id)->first();
        if(\Hash::check($request->input('old_password'), $user->password)){
          \Log::info('HashCheckOldPAssword'.$update=['password']);
        \App\Containers\User\Models\User::where('id',$user->id)->update($update);
            return \Response::json(['status'=>'success']);
        }
        }
        if(null!=$request->input('customer_id')){
          \Log::info('customer_id'.$update=['password']);
        \App\Containers\User\Models\User::where('id',$request->input('customer_id'))->update($update);}
        if(null!=$request->input('email')){
        \App\Containers\User\Models\User::where('email',$request->input('email'))->update($update);
            return redirect()->back()->with('message', 'Ваш пароль изменен !');
        }
        return json_encode(['result'=>'success']);
    }

    public function userBan(GetAllUsersRequest $request){
        \Log::info('USER'.$request->input('customer_id'));
        $user= \App\Containers\User\Models\User::withTrashed()->where('id',intval($request->input('customer_id')))->first();

        if($user->ip){
            \Log::info('USER',array($user));
            $result=Firewall::blacklist($user->ip, true);
            \Log::info('result'.$result);
            User::withTrashed()->where('id',$request->input('customer_id'))->update(['confirmed'=>User::STATUS_BANNED]);
            Firewall::blockAccess();
            return json_encode(['result'=>'success']);
        }
        else{
            return json_encode(['result'=>'no_ip']);
        }
    }

    public function userUnBan(GetAllUsersRequest $request){
        \Log::info('USER'.$request->input('customer_id'));
        $user= \App\Containers\User\Models\User::withTrashed()->where('id',intval($request->input('customer_id')))->first();

        if($user->ip){
            \Log::info('USER',array($user));
            $result=Firewall::whitelist($user->ip);
            \Log::info('result'.$result);
            User::withTrashed()->where('id',$request->input('customer_id'))->update(['confirmed'=>User::STATUS_DELETED]);
            Firewall::blockAccess();
            return json_encode(['result'=>'success']);
        }
        else{
            return json_encode(['result'=>'no_ip']);
        }
    }


    public function sendRecoveryPasswordLink(GetAllUsersRequest $request){

        $user=User::withTrashed()->where('email',$request->input('email'))->first();
         if($user){
             $user->verify_token = Str::random();
             $user->save();
        dispatch(new \App\Containers\User\Jobs\RecoveryMail($user))->onQueue('queue_name');
             return json_encode(['response'=>'success']);
         }
         else{
             return json_encode(['response'=>'no_email']);
         }

    }

    public function goToBusinessUsers(GoToBusinessUsersRequest $request){
    $businessUser=[
      'company_name'=>$request->input('company_name'),
      'user_id'=>$request->input('id'),
      'business_type'=>$request->input('business_type'),
      'business_location'=>$request->input('business_location'),
      'email'=>$request->input('email'),
      'www'=>$request->input('www'),
    ];
    \App\Containers\User\Models\BusinessUser::insert($businessUser);
      \App\Containers\User\Models\User::where('id',$request->input('id'))->update(['business_users_flag'=>1]);
      return json_encode(['response'=>'success']);
    }

    public function businessUsers(GetAllUsersRequest $request){
      $data['businessusers']=\App\Containers\User\Models\BusinessUser::paginate(10);
      $data['properties']=GlobalService::getMainProperties($request)['categories'];
      $categoriesOnlyRoot = GlobalService::getMainProperties($request)['categoriesOnlyRoot'];
      return view('user::businessuser.index', compact('categoriesOnlyRoot','data'));

    }

    public function deleteRegistration(GetAllUsersRequest $request){

    $user=\Auth::user();
    $user->delete();
      \Auth::logout();
      return redirect()->route('get_main_home_page');
    }

  public function sendConfirmationEmail(GetAllUsersRequest $request){
    $user=\Auth::user();
    dispatch(new VerifyMail($user))->onQueue('queue_name');
  }

  public function changeEmail(GetAllUsersRequest $request){
    $user=\Auth::user();
    $user= \App\Containers\User\Models\User::where('id',\Auth::user()->id)->update(['email'=>$request->email]);
    dispatch(new VerifyMail($user))->onQueue('queue_name');
  }

}
