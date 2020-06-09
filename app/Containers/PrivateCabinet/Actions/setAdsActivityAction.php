<?php

namespace App\Containers\PrivateCabinet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class setAdsActivityAction extends Action
{
    public function run(Request $request)
    {
        if($request->input('state')=='true'){
            $message_data=[
                'active'=>true
            ];

        }
        else{
            $message_data=[
                'active'=>false
            ];
        }
        $activity = \App\Containers\Ad\Models\Ad::where('id',$request->input('message'))->update($message_data);

        return $activity;
    }
}
