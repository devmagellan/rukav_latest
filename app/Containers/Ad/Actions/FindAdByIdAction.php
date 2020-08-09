<?php

namespace App\Containers\Ad\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAdByIdAction extends Action
{
    public function run(Request $request)
    {
        if($request->has('message_id')){
            $request->id=$request->input('message_id');
        }
        $ad = Apiato::call('Ad@FindAdByIdTask', [$request->id]);
        return $ad;
    }
}
