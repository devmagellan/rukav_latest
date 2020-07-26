<?php

namespace App\Containers\StaticPage\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateStaticPageAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $staticpage = Apiato::call('StaticPage@CreateStaticPageTask', [$data]);

        return $staticpage;
    }
}
