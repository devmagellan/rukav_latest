<?php

namespace App\Containers\AdminPanel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAdminPanelAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AdminPanel@DeleteAdminPanelTask', [$request->id]);
    }
}
