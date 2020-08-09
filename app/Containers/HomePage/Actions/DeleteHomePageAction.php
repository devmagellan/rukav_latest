<?php

namespace App\Containers\HomePage\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteHomePageAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('HomePage@DeleteHomePageTask', [$request->id]);
    }
}
