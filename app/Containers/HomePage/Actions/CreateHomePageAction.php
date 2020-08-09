<?php

namespace App\Containers\HomePage\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateHomePageAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $homepage = Apiato::call('HomePage@CreateHomePageTask', [$data]);

        return $homepage;
    }
}
