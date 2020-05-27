<?php

namespace App\Containers\Site\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSiteByIdAction extends Action
{
    public function run(Request $request)
    {
        $site = Apiato::call('Site@FindSiteByIdTask', [$request->id]);

        return $site;
    }
}
