<?php

namespace App\Containers\Connect\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindConnectByIdAction extends Action
{
    public function run(Request $request)
    {
        $connect = Apiato::call('Connect@FindConnectByIdTask', [$request->id]);

        return $connect;
    }
}
