<?php

namespace App\Containers\AdminMenu\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAdminMenuAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $adminmenu = Apiato::call('AdminMenu@CreateAdminMenuTask', [$data]);

        return $adminmenu;
    }
}
