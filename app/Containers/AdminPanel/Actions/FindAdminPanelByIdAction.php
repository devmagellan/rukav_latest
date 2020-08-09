<?php

namespace App\Containers\AdminPanel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAdminPanelByIdAction extends Action
{
    public function run(Request $request)
    {
        $adminpanel = Apiato::call('AdminPanel@FindAdminPanelByIdTask', [$request->id]);

        return $adminpanel;
    }
}
