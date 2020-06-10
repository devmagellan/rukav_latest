<?php

namespace App\Containers\Connect\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateConnectAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $connect = Apiato::call('Connect@CreateConnectTask', [$data]);

        return $connect;
    }
}
