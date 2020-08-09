<?php

namespace App\Containers\AdminMenu\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAdminMenuByIdAction extends Action
{
    public function run(Request $request)
    {
        $adminmenu = Apiato::call('AdminMenu@FindAdminMenuByIdTask', [$request->id]);

        return $adminmenu;
    }
}
