<?php

namespace App\Ship\Middlewares\Http;

use App\Containers\Authentication\Exceptions\AuthenticationException;
use Exception;
use Illuminate\Auth\Middleware\Authenticate as LaravelAuthenticate;

/**
 * Class Authenticate
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Authenticate extends LaravelAuthenticate
{
    public function authenticate($request, array $guards)
    {
		//dd($guards);
        try {
            return parent::authenticate($request, $guards);
        }
        catch (Exception $exception) {
				if($guards[0]=='admin'){
					dump(667);
					return redirect()->route('get_admin_login_page');
				}
				
			
			
            throw new AuthenticationException();
        }
    }
}
