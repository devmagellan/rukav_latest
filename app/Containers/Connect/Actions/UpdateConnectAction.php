<?php

namespace App\Containers\Connect\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateConnectAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $connect = Apiato::call('Connect@UpdateConnectTask', [$request->id, $data]);

        return $connect;
    }
}
