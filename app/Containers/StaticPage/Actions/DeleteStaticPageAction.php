<?php

namespace App\Containers\StaticPage\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteStaticPageAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('StaticPage@DeleteStaticPageTask', [$request->id]);
    }
}
