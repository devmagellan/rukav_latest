<?php

namespace App\Containers\StaticPage\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllStaticPagesAction extends Action
{
    public function run(Request $request)
    {
        $staticpages = Apiato::call('StaticPage@GetAllStaticPagesTask', [], ['addRequestCriteria']);

        return $staticpages;
    }
}
