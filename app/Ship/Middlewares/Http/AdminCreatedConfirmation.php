<?php

namespace App\Ship\Middlewares\Http;

use App\Ship\Parents\Middlewares\Middleware;
use App\Containers\User\Models\User;
use Carbon\Carbon;

class AdminCreatedConfirmation extends Middleware
{

    public function handle($request, \Closure $next)

    {
      if(\Auth::user()){
        \Log::info('url'.$request->path());
        \Log::info('AdminCreatedConfirmation',array(\Auth::user()));
        if(\Auth::user()->admin_created_confirmation==null && \Auth::user()->confirmed==User::STATUS_CREATED_BY_ADMIN_NOT_CONFIRMED){
          \Auth::user()->admin_created_confirmation=Carbon::now();
          \Auth::user()->save();
		  \Session::put('ShowWeeklyAdminCreatedConfirmation',1);
            \Log::info('SESSION=>'.\Session::has('ShowWeeklyAdminCreatedConfirmation'));
            \Log::info('SESSION=>'.\Session::get('ShowWeeklyAdminCreatedConfirmation') );

        }
        elseif($request->path()=='private_cabinet' && (\Auth::user()->admin_created_confirmation!=null && \Auth::user()->confirmed==User::STATUS_CREATED_BY_ADMIN_NOT_CONFIRMED)){
          \Log::info('diff2');
          $date=Carbon::createFromFormat('Y-m-d H:i:s',  \Auth::user()->admin_created_confirmation);
          \Log::info('diff1'.$date);
          $diff=(null!=$date) ? $date->diffInDays(Carbon::now()) : null;


          if($diff>=7){
            \Log::info('diff5'.$diff);
            \Auth::user()->admin_created_confirmation=Carbon::now();
            \Auth::user()->save();
            \Session::put('ShowWeeklyAdminCreatedConfirmation',1);
            \Log::info('SESSION=>'.\Session::has('ShowWeeklyAdminCreatedConfirmation'));
            \Log::info('SESSION=>'.\Session::get('ShowWeeklyAdminCreatedConfirmation') );


          }
        }
      }
        $response = $next($request);




        return $response;
    }

}
