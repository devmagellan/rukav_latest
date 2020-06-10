<?php

namespace App\Containers\Connect\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteConnectAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Connect@DeleteConnectTask', [$request->id]);
    }
}
