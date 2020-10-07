<?php

namespace App\Containers\Authentication\UI\WEB\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authentication\UI\WEB\Requests\LoginRequest;
use App\Containers\Authentication\UI\WEB\Requests\LoginUserRequest;
use App\Containers\Authentication\UI\WEB\Requests\LogoutRequest;

use App\Ship\Parents\Controllers\WebController;
use App\Ship\Transporters\DataTransporter;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Containers\User\Models\User;
use App\Containers\User\Jobs\SendEmailVerification;
use App\Containers\User\Services\SmsService;

/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends WebController
{

  private $smsService;

  /**
   * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function showLoginPage()
  {
    return view('authentication::login');
  }

  /**
   * @return  \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function logoutAdmin(LogoutRequest $request)
  {
    Apiato::call('Authentication@WebLogoutAction');
    return redirect('login');
  }

  /**
   * @param \App\Containers\Authentication\UI\WEB\Requests\LoginRequest $request
   *
   * @return  \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function loginAdmin(LoginRequest $request)
  {

    try {
      $result = Apiato::call('Authentication@WebAdminLoginAction', [new DataTransporter($request)]);
      \Log::info('LoginResult',array($result));
        \Log::info('LoginResultAuthUser',array(\Auth::guard('admin')->user()));
    } catch (Exception $e) {
        \Log::info('Exception',array($e));
      return redirect('login')->with('status', $e->getMessage());
    }

    return is_array($result) ? redirect('login')->with($result) : redirect('dashboard');
  }

  public function loginUser(LoginUserRequest $request)
  {

   $user=User::where('email',$request->email)->where('confirmed',User::STATUS_INACTIVE)->where('is_confirmed_phone',0)->first();
    if(!$user){
    $user1=User::where('email',$request->email)->where('confirmed',User::STATUS_INACTIVE)->first();}
    if($user){
      $this->smsService=new SmsService();
      $message=$this->smsService->store(new \Illuminate\Http\Request(array($user)));
      session()->put('emailVerificationTelephone',$user->phone);
      $emailCode = rand(1000, 9999);
      $user->emailCode=$emailCode;
      $user->save();
      session()->put('emailVerificationCode',$emailCode);
      session()->put('emailVerificationCodeUser',$user->id);
      dispatch(new SendEmailVerification($user))->onQueue('queue_name');
      return response(['message'=>'Не подтвержденный email и телефон','email'=>$request->email,'password'=>$request->password], Response::HTTP_CONFLICT);
    }elseif($user1){
      $emailCode = rand(1000, 9999);
      $user->emailCode=$emailCode;
      $user->save();
      session()->put('emailVerificationCode',$emailCode);
      session()->put('emailVerificationCodeUser',$user->id);
      dispatch(new SendEmailVerification($user))->onQueue('queue_name');
      return response(['message'=>'Не подтвержденный email','email'=>$request->email,'password'=>$request->password], Response::HTTP_CONFLICT);
    }



    if (\Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password , 'confirmed' => User::STATUS_ACTIVE])) {
        \Log::info('IP'.\Request::ip());
        User::where('id',\Auth::user()->id)->update(['ip'=>\Request::ip(),'last_login_datetime'=>\Carbon\Carbon::now()]);
        \Log::info('Auth',array(\Auth::user()));
      return response(['message' => true], Response::HTTP_OK);
    }

    return response(['Не правильный логин или пароль'], Response::HTTP_CONFLICT);
  }


  public function accessBlocked(){
      dd('Ваш IP адресс заблокирован');
      return view('authentication::access_blocked');
  }

  public function logoutUser()
  {
    Auth::logout();
    return redirect('/');
  }


    public function verify($token)
    {
        if (!$user = User::where('verify_token', $token)->first()) {
            return redirect()->route('login_user')
                ->with('error', 'Sorry your link cannot be identified.');
        }

        $user->confirmed = User::STATUS_ACTIVE;
        $user->verify_token = null;





        $user->save();
		\Log::info('Verified user=>',array($user));
        \Auth::guard('web')->loginUsingId($user->id, true);
        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            '500e0547867ccfe184af',
            'b8d3a1076b93fe80dd50',
            '1000615',
            $options
        );
        $pusher->trigger('login-channel', /* 'my-event' */'login-event',['id'=>$user->id]);

        return redirect('/')
            ->with('success', 'Your e-mail is verified. You can now login.');
    }


    public function recoveryVerify($token)
    {
        if (!$user = User::where('verify_token', $token)->first()) {
            return redirect()->route('login_user')
                ->with('error', 'Sorry your link cannot be identified.');
        }
        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            '500e0547867ccfe184af',
            'b8d3a1076b93fe80dd50',
            '1000615',
            $options
        );
        $pusher->trigger('recovery-channel', /* 'my-event' */'recovery-event',['id'=>$user->id]);
        session()->put('recoveryPasswordEmail',$user->email);
        return redirect('/')
            ->with('recovery', 'Your e-mail is correct You can change password.');
    }


  public function verifySocial($token)
  {
    if (!$user = User::where('verify_token', $token)->first()) {
      return redirect()->route('login_user')
        ->with('error', 'Sorry your link cannot be identified.');
    }

    $user->confirmed = User::STATUS_ACTIVE;
    $user->verify_token = null;





    $user->save();
    \Log::info('Verified user=>',array($user));
    \Auth::guard('web')->loginUsingId($user->id, true);
    $options = array(
      'cluster' => 'eu',
      'useTLS' => true
    );
    $pusher = new \Pusher\Pusher(
      '500e0547867ccfe184af',
      'b8d3a1076b93fe80dd50',
      '1000615',
      $options
    );
    $pusher->trigger('login-channel', /* 'my-event' */'login-event',['id'=>$user->id]);

    return redirect('/')
      ->with('successSocial', 'Your e-mail is verified. Your social account approoved.');
  }



}
