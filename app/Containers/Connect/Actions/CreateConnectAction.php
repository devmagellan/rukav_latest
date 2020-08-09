<?php

namespace App\Containers\Connect\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Apiato\Core\Traits\SanitizerTrait;

class CreateConnectAction extends Action
{
    public function run(Request $request)
    {
     //dd($request);
     $data = $request->sanitizeInput([
         'receiver_id',
         'message_id',
         'sender_id',
         'sender_name',
         'sender_email',
         'sender_phone',
         'text',
        ]);

        $connect = Apiato::call('Connect@CreateConnectTask', [$data]);
        return $connect;
    }
}
