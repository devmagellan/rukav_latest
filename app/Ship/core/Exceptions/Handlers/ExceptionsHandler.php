<?php

namespace Apiato\Core\Exceptions\Handlers;

use Illuminate\Foundation\Exceptions\Handler as LaravelExceptionHandler;

/**
 * Class ExceptionsHandler
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ExceptionsHandler extends LaravelExceptionHandler
{


    public function report(\Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
   public function render($request, \Throwable $exception)
    {

        if ($exception instanceof \App\Containers\Authentication\Exceptions\AuthenticationException) {
            return redirect('login');
        }
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            dump('Credicom warning ! You have no access rights to view this functionality !'); dd( 'Ask your Superadmin to give you access');
        }
        return parent::render($request, $exception);
    }

}
