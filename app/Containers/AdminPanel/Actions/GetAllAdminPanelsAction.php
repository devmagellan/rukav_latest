<?php

namespace App\Containers\AdminPanel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAdminPanelsAction extends Action
{
    public function run(Request $request)
    {
        $adminpanels = Apiato::call('AdminPanel@GetAllAdminPanelsTask', [], ['addRequestCriteria']);

        return $adminpanels;
    }
}
