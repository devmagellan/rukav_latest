<?php

namespace App\Containers\AdminMenu\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAdminMenuAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AdminMenu@DeleteAdminMenuTask', [$request->id]);
    }
}
