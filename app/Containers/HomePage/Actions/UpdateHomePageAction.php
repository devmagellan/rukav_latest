<?php

namespace App\Containers\HomePage\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateHomePageAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $homepage = Apiato::call('HomePage@UpdateHomePageTask', [$request->id, $data]);

        return $homepage;
    }
}
