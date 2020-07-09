<?php

namespace App\Containers\StaticPage\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindStaticPageByIdAction extends Action
{
    public function run(Request $request)
    {
        $staticpage = Apiato::call('StaticPage@FindStaticPageByIdTask', [$request->id]);

        return $staticpage;
    }
}
