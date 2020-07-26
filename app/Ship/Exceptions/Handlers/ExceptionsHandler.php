<?php

namespace App\Ship\Exceptions\Handlers;

use Apiato\Core\Exceptions\Handlers\ExceptionsHandler as CoreExceptionsHandler;
use Throwable;
use Apiato\Core\Foundation\Facades\Apiato;
/**
 * Class ExceptionsHandler
 *
 * A.K.A (app/Exceptions/Handler.php)
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ExceptionsHandler extends CoreExceptionsHandler
{


    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {

        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404) {
                $categories= \App\Containers\Site\Models\ProductCategory::get();
                $categoriesOnlyRoot = $categories->where('parent_id', 0);
                $user=null;
                if(\Auth::user()){
                    $user=\App\Containers\User\Models\User::where('id',\Auth::user()->id)->first();}

                return response()->view('errors.' . '404', compact('categoriesOnlyRoot', 'categories','user'), 404);
            }
        }

        return parent::render($request, $exception);
    }
}
