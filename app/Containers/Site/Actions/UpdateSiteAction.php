<?php

namespace App\Containers\Site\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSiteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $site = Apiato::call('Site@UpdateSiteTask', [$request->id, $data]);

        return $site;
    }
}
