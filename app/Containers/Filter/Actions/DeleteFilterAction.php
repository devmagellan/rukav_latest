<?php

namespace App\Containers\Filter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteFilterAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Filter@DeleteFilterTask', [$request->id]);
    }
}
