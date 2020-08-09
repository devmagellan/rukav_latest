<?php

namespace App\Containers\PrivateCabinet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeletePrivateCabinetAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('PrivateCabinet@DeletePrivateCabinetTask', [$request->id]);
    }
}
