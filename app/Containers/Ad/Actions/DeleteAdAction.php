<?php

namespace App\Containers\Ad\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAdAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Ad@DeleteAdTask', [$request->id]);
    }
}
