<?php

namespace App\Containers\HomePage\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindHomePageByIdAction extends Action
{
    public function run(Request $request)
    {
        $homepage = Apiato::call('HomePage@FindHomePageByIdTask', [$request->id]);

        return $homepage;
    }
}
