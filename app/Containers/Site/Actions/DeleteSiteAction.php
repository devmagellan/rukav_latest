<?php

namespace App\Containers\Site\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSiteAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Site@DeleteSiteTask', [$request->id]);
    }
}
