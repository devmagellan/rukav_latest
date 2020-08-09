<?php

namespace App\Containers\Site\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSitesAction extends Action
{
    public function run(Request $request)
    {
        $sites = Apiato::call('Site@GetAllSitesTask', [], ['addRequestCriteria']);

        return $sites;
    }
}
