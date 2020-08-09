<?php

namespace App\Containers\Authorization\Exceptions;

use Apiato\Core\Exceptions\Handlers\ExceptionsHandler as ExceptionHandler;

class Handler extends ExceptionHandler
{
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
