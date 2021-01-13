<?php

namespace App\Containers\Ad\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use App\Containers\Ad\UI\WEB\Requests\GetAllAdsDataTableRequest;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Http\Response;
use App\Ship\Parents\Requests\Request;


/**
 * Class Controller
 *
 * @package App\Containers\Ad\UI\WEB\Controllers
 */
class ImgController extends WebController
{
    public function addDeletedImgsToSession(GetAllAdsDataTableRequest $request){

        session()->push('deletedImgsToSession',['id'=>$request->input('id'),'img'=>$request->input('img')]);
        \Log::info('deletedImgsToSession',session()->get('deletedImgsToSession'));
        return json_encode(['result'=>'success']);
    }

  public function addUpdatedImgsToSession(GetAllAdsDataTableRequest $request){

    session()->push('updatedImgsToSession',['id'=>$request->input('id'),'img'=>$request->input('img'),'photo_id'=>$request->input('photo_id')]);
    \Log::info('updatedImgsToSession',session()->get('updatedImgsToSession'));
    return json_encode(['result'=>'success']);
  }

}
