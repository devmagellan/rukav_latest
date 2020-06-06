<?php

namespace App\Containers\User\UI\WEB\Controllers;

use App\Containers\User\UI\WEB\Requests\RegisterUserRequest;
use App\Ship\Parents\Controllers\WebController;
use App\Containers\User\UI\WEB\Requests\GetAllUsersRequest;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends WebController
{

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

}
