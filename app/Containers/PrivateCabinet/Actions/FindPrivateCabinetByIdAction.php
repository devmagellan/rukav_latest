<?php

namespace App\Containers\PrivateCabinet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindPrivateCabinetByIdAction extends Action
{
    public function run(Request $request)
    {
        $privatecabinet = Apiato::call('PrivateCabinet@FindPrivateCabinetByIdTask', [$request->id]);

        return $privatecabinet;
    }
}
