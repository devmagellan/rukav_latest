<?php

namespace App\Containers\Connect\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllConnectsAction extends Action
{
    public function run(Request $request)
    {
        $connects = Apiato::call('Connect@GetAllConnectsTask', [], ['addRequestCriteria']);

        return $connects;
    }
}
