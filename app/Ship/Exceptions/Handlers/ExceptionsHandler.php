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
        //\Log::info('catched8',array($exception));
        if ($this->isHttpException($exception)) {
            $categories= \App\Containers\Site\Models\ProductCategory::get();
            $categoriesOnlyRoot = $categories->where('parent_id', 0);
            $user=null;
            if ($exception->getStatusCode() == 404) {


                if(\Auth::user()){
                    $user=\App\Containers\User\Models\User::where('id',\Auth::user()->id)->first();}

                return response()->view('errors.' . '404', compact('categoriesOnlyRoot', 'categories','user'), 404);
            }

            if ($exception->getMessage() == 'Access denied IP blocked') {
                \Log::info('catched12'.$exception->getMessage());
                return response(['errors'=>['ip'=>'IP адресс заблокирован'],'email'=>$request->email,'password'=>$request->password], 403);
            }
        }

        return parent::render($request, $exception);
    }
}
