<?php

namespace App\Containers\Ad\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAdByIdAction extends Action
{
    public function run(Request $request)
    {
        $ad = Apiato::call('Ad@FindAdByIdTask', [$request->id]);

        return $ad;
    }
}
