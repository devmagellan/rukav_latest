<?php

namespace App\Containers\User\UI\WEB\Controllers;

use App\Containers\User\UI\WEB\Requests\RegisterUserRequest;
use App\Containers\User\UI\WEB\Requests\ChangeFromSimpleUserRequest;
use App\Ship\Parents\Controllers\WebController;
use App\Containers\User\UI\WEB\Requests\GetAllUsersRequest;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Services\UserService;
use App\Containers\User\Services\SmsService;

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
  public function index(GetAllUsersRequest $request)
  {
    //$adminpanels = Apiato::call('AdminPanel@GetAllAdminPanelsAction', [$request]);
    //$data=$this->mainSettings();
    //$data['menu']=$this->menu();
    $role = \Auth::user()->roles;


    //$data['customer']=null;
    //$data['company']=\Auth::user()->getCompany[0];
    //$data['company_id']=\Auth::user()->getCompany[0]->id;

    //$data['managers']=\App\Domain\Manager\Models\Manager::where('company_id',$data['company_id'])->with('user')->get();
    $data['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
    $data['title'] = "Додати товар";
    $data['keywords'] = "Ukrainian industry platform";
    $data['description'] = "Ukrainian industry platform";
    return view('user::index', $data);
  }

  public function postData(GetAllUsersRequest $request)
  {

    $data['title'] = "Customers postData";
    $company_id = 1;//\Auth::user()->getCompany[0]->id;
    /*$data['customers']=\App\User::join('customers', function ($join) use ($company_id) {
        $join->on('users.id', '=', 'customers.user_id')
            ->where('customers.company_id', $company_id);
    })->with('getCustomersCompany')->get();*/
    if (\Auth::user()->hasRole('Gods_mode')) {
      $data['customers'] = \App\Containers\User\Models\User::with('getCustomersCompany')->get();
    } else {
      $data['customers'] = \App\Containers\User\Models\User::with('getCustomersCompany')->get();
    }


    //rightJoin('customers', 'users.id', '=', 'user_id')->where('customers.company_id',$company_id)
    return view('user::table', $data);
  }


  public function emailCheck(GetAllUsersRequest $request)
  {

    if (null !== ($request->input('email'))) {
      $email = $request->input('email');
      $results = \App\Containers\User\Models\User::where('email', $email)->first();
      if ($results) {
        return json_encode("taken");
      } else {
        return json_encode('not_taken');
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
if($request->input('customer_id') != 0){
    $user = Apiato::call('User@UpdateUserAccountAction', [$request]);}
    else{$user = Apiato::call('User@CreateUserAccountAction', [$request]);}
var_dump($user);
   // $user = UserFacade::updateUser($user);
    if ($changeRole == null) {
      $role_data = [
        'role_id' => 5,
        'model_type' => 'App\User',
        'model_id' => $user->id
      ];
        \App\Containers\Authorization\Models\ModelHasRole::insert($role_data);
    }
    $string = $request->input('birth_date') . ' 16:34:00';
    $birth_date = \Carbon\Carbon::createFromFormat('m/d/Y H:i:s', $string, 'Europe/London');
    $birth_date->setTimezone('UTC');
    $start_string = $request->input('start_date') . ' 16:34:00';
    $start_date = \Carbon\Carbon::createFromFormat('m/d/Y H:i:s', $start_string, 'Europe/London');
    $start_date->setTimezone('UTC');
    $customer_tmp = \App\Containers\Customer\Models\Customer::where('user_id', $request->input('customer_id'))->first();
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

        $user=\App\Containers\User\Models\User::firstOrCreate($staff);
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


    public function confirmEmailPhone(GetAllUsersRequest $request){
        $error=[];
     // var_dump(session()->get('emailVerificationCode'));
        if($request->input('emailConfirmation')!='' && $request->input('emailConfirmation')==session()->get('emailVerificationCode') ){
            $emailConfirmed=true;
        }
        else{
            //var_dump(1);
            $emailConfirmed=false;
           $error[]='error emailCode';
        }

$smsCode=\App\Containers\Authorization\Models\SmsVerification::where('phone',session()->get('emailVerificationTelephone'))->orderBy('id','desc')->first();
        if($request->input('phoneConfirmationSecond')!='' && $request->input('phoneConfirmationSecond')==$smsCode->code ){
            $phoneConfirmed=true;
        }
        else{
            //var_dump(2);
            $phoneConfirmed=false;
            $error[]='error SmsCode';
            //return response()->json(['response'=>'error SmsCode'],403);
        }


        if($emailConfirmed && $phoneConfirmed){
		$tmp_user=\App\Containers\User\Models\TmpUser::where('id',session()->get('emailVerificationCodeUser'))->first();
          // replace the data
        $staff = $tmp_user->replicate();

        // make into array for mass assign. 
        //make sure you activate $guarded in your Staff model
        $staff = $tmp_user->toArray();

        $user=\App\Containers\User\Models\User::firstOrCreate($staff);
		$user->active=1;
		$user->save();
          \Auth::guard('web')->loginUsingId($user->id, true);
            return response()->json(['response'=>'success'],200);
        }
        return response()->json(['response'=>$error],403);
    }

    public function changeRegisterFromSimpleUser(ChangeFromSimpleUserRequest $request){
        $this->smsService=new SmsService();
        $message=$this->smsService->store($request);
        session()->put('emailVerificationTelephone',$request->phone);
        $collection=$request->all();
        session()->put('updatedUser',$collection);
        return response()->json(['response'=>'success'],200);
    }

    public function changeRegisterFromRestUser(ChangeFromSimpleUserRequest $request){
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

}
