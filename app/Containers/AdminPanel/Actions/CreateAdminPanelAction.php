<?php

namespace App\Containers\AdminPanel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAdminPanelAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $adminpanel = Apiato::call('AdminPanel@CreateAdminPanelTask', [$data]);

        return $adminpanel;
    }
}
